<?php
$conn = mysqli_connect("localhost", "root", "", "phpdasar");

function query($query){

    global $conn;
    $result = mysqli_query($conn, $query);
    $rows = [];
    
    if(!$result) {
    echo mysqli_error($conn);
    }
    
    while ($row = mysqli_fetch_assoc($result)) {
        $rows[] = $row;
    }
    return $rows;
}

function tambah($data){
    global $conn;
    $title = htmlspecialchars($data["title"]);
    $studio = htmlspecialchars($data["studio"]);
    $genre = htmlspecialchars($data["genre"]);
    $image = upload();
    if(!isset($_FILES['image'])) {
        echo "<script>
            alert('Please choose an image!');
            document.location.href = 'index.php';
        </script>";
        return false;
    }
    
    $query = "INSERT INTO anime VALUES ('','$title','$studio','$genre','img/$image')";
    mysqli_query($conn, $query);
    
    return mysqli_affected_rows($conn);
}

function delete($id){
    global $conn;
    mysqli_query($conn, "DELETE FROM anime WHERE id = $id");
    return mysqli_affected_rows($conn);
}

function upload(){
    $namaFile = $_FILES['image']['name'];
    $ukuranFile = $_FILES['image']['size'];
    $error = $_FILES['image']['error'];
    $tmpName = $_FILES['image']['tmp_name'];
    
    if($error === 4) {
        echo "<script>
            alert('Please choose an image!');
            document.location.href = 'index.php';
        </script>";
        return false;
    }
    // cek yg diupload adalah gambar
    $ekstensiGambarValid = ['jpg', 'jpeg', 'png'];
    // gunakan expload untuk memecah string setelah "."
    $ekstensiGambar = explode('.', $namaFile);
    // strtolower untuk mengubah huruf menjadi huruf kecil
    $ekstensiGambar = strtolower(end($ekstensiGambar));
    // cek dalam array apakah terdapat ekstensi gambar yang valid
    if(!in_array($ekstensiGambar, $ekstensiGambarValid)) {
        echo "<script>
            alert('Please choose a valid image!');
            document.location.href = 'index.php';
        </script>";
        return false;
    }
    // cek ukuran file apabila lebih kembalikan error
    if($ukuranFile > 1000000) {
        echo "<script>
            alert('Please choose a smaller image!');
            document.location.href = 'index.php';
        </script>";
        return false;
    }
    // generate nama file baru
    $namafilebaru = uniqid();
    $namafilebaru .= '.';
    $namafilebaru .= $ekstensiGambar;
    // copy file ke folder img
    move_uploaded_file($tmpName, '.\img/' . $namafilebaru);
    return $namafilebaru;
}

function update($data,$id){
    global $conn;
    $title = htmlspecialchars($data["title"]);
    $studio = htmlspecialchars($data["studio"]);
    $genre = htmlspecialchars($data["genre"]);
    $imagelama = htmlspecialchars($data["imageLama"]);

    if($_FILES['image']['error'] === 4) {
        $image = $imagelama;
    } else {
        $image = upload();
    }
    $query = "UPDATE anime SET title = '$title', studio = '$studio', genre = '$genre', image = '$image' WHERE id = $id";
    mysqli_query($conn, $query);
    
    return mysqli_affected_rows($conn);
}
function search($keyword){
    $query = "SELECT * FROM anime WHERE
    title LIKE '%$keyword%' OR
    studio LIKE '%$keyword%' OR
    genre LIKE '%$keyword%'";
    return query($query);
}

function register($data){
    global $conn;

    $username = strtolower(stripslashes($data["username"]));
    $password = mysqli_real_escape_string($conn, $data["password"]);
    $password2 = mysqli_real_escape_string($conn, $data["password2"]);

    // cek username sudah ada atau belum
    $result = mysqli_query($conn, "SELECT username FROM users WHERE username = '$username'");
    
    if(mysqli_fetch_assoc($result)) {
        echo "<script>
            alert('Username already exists!');
            document.location.href = 'registrasi.php';
        </script>";
        return false;
    }
    if($password !== $password2) {
        echo "<script>
            alert('Password not match!');
            document.location.href = 'registrasi.php';
        </script>";
        return false;
    }
    else {
        $password = password_hash($password, PASSWORD_DEFAULT);
        $query = "INSERT INTO users VALUES ('','$username','$password')";
        mysqli_query($conn, $query);
        return mysqli_affected_rows($conn);
    }
}
//  function login($data){
//     global $conn;
//     $username = $data["username"];
//     $password = $data["password"];
//     $result = mysqli_query($conn, "SELECT * FROM users WHERE username = '$username'");
//     if(mysqli_num_rows($result)===1) {
//         $row = mysqli_fetch_assoc($result);
//         if(password_verify($password, $row["password"])) {
//             header("Location: index.php");
//             exit;
//         }
//     }
//     return false;
    

//  }

?>