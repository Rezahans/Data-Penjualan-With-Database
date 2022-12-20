<?php
// Include config file
require "config.php";

// Define variables and initialize with empty values
 $nama = $alamat =  $HP =$Tgl_Transaksi =$Jenis_barang =$Nama_Barang =$Jumlah =$Harga ="";
 $nama_err = $alamat_err =  $HP_err =$Tgl_Transaksi_err =$Jenis_barang_err =$Nama_Barang_err =$Jumlah_err =$Harga_err ="";

// Processing form data when form is submitted
if(isset($_POST["Id_pembeli"]) && !empty($_POST["Id_pembeli"])){
    // Get hidden input value
    $Id_pembeli = $_POST["Id_pembeli"];

    
      // Validate nama
      $input_nama = trim($_POST["nama"]);
      if(empty($input_nama)){
        $nama_err = "Please enter a nama.";
    } elseif(!filter_var($input_nama, FILTER_VALIDATE_REGEXP, array("options"=>array("regexp"=>"/^[a-zA-Z\s]+$/")))){
        $nama_err = "Please enter a valid nama.";
    } else{
        $nama = $input_nama;
    }

      // Validate alamat
    $input_alamat = trim($_POST["alamat"]);
    if(empty($input_alamat)){
        $alamat_err = "Please enter a alamat.";
    } elseif(!filter_var($input_alamat, FILTER_VALIDATE_REGEXP, array("options"=>array("regexp"=>"/^[a-zA-Z\s]+$/")))){
        $alamat_err = "Please enter a valid alamat.";
    } else{
        $alamat = $input_alamat;
    }

        // Validate HP
        $input_HP = trim($_POST["HP"]);
        if(empty($input_HP)){
            $HP_err = "Please enter the HP value.";
        } elseif(!ctype_digit($input_HP)){
            $HP_err = "Please enter a positive integer value.";
        } else{
            $HP = $input_HP;
        }
      
    
        // Validate Tgl_Transaksi
    $input_Tgl_Transaksi = trim($_POST["Tgl_Transaksi"]);
    if(empty($input_Tgl_Transaksi)){
        $Tgl_Transaksi_err = "Please enter a Tgl_Transaksi.";
    } else{
        $Tgl_Transaksi = $input_Tgl_Transaksi;
    }
    // Validate Jenis_barang
    $input_Jenis_barang = trim($_POST["Jenis_barang"]);
    if(empty($input_Jenis_barang)){
        $Jenis_barang_err = "Please enter a Jenis_barang.";
    } elseif(!filter_var($input_Jenis_barang, FILTER_VALIDATE_REGEXP, array("options"=>array("regexp"=>"/^[a-zA-Z\s]+$/")))){
        $Jenis_barang_err = "Please enter a valid Jenis_barang.";
    } else{
        $Jenis_barang = $input_Jenis_barang;
    }
    // Validate Nama_Barang
    $input_Nama_Barang = trim($_POST["Nama_Barang"]);
    if(empty($input_Nama_Barang)){
        $Nama_Barang_err = "Please enter a Nama_Barang.";
    } elseif(!filter_var($input_Nama_Barang, FILTER_VALIDATE_REGEXP, array("options"=>array("regexp"=>"/^[a-zA-Z\s]+$/")))){
        $Nama_Barang_err = "Please enter a valid Nama_Barang.";
    } else{
        $Nama_Barang = $input_Nama_Barang;
    }

    // Validate Jumlah
    $input_Jumlah = trim($_POST["Jumlah"]);
    if(empty($input_Jumlah)){
        $Jumlah_err = "Please enter the Jumlah value.";
    } elseif(!ctype_digit($input_Jumlah)){
        $Jumlah_err = "Please enter a positive integer value.";
    } else{
        $Jumlah = $input_Jumlah;
    }

     // Validate Harga
     $input_Harga = trim($_POST["Harga"]);
     if(empty($input_Harga)){
         $Harga_err = "Please enter the Harga value.";
     } elseif(!ctype_digit($input_Harga)){
         $Harga_err = "Please enter a positive integer value.";
     } else{
         $Harga = $input_Harga;
     }


    // Check input errors before inserting in database
    if(empty($nama_err) && empty($alamat_err) && empty($HP_err)  && empty($Tgl_Transaksi_err ) && empty($Jenis_barang_err) && empty($Nama_Barang_err)  && empty($Jumlah_err)  && empty($Harga_err))  {
        // Prepare an insert statement
        $sql = "UPDATE latif SET nama=?, alamat=?, HP=?, Tgl_Transaksi=?, Jenis_barang=?, Nama_Barang=?, Jumlah=?, Harga=? WHERE Id_pembeli=?";

        if($stmt = mysqli_prepare($link, $sql)){
            // Bind variables to the prepared statement as parameters
            mysqli_stmt_bind_param($stmt, "ssssssssi",$param_nama, $param_alamat,  $param_HP,  $param_Tgl_Transaksi, $param_Jenis_barang, $param_Nama_Barang , $param_Jumlah, $param_Harga ,$param_Id_pembeli);

            // Set parameters

            $param_nama = $nama;
            $param_alamat = $alamat;
            $param_HP =  $HP;
            $param_Tgl_Transaksi = $Tgl_Transaksi;
            $param_Jenis_barang = $Jenis_barang;
            $param_Nama_Barang = $Nama_Barang;
            $param_Jumlah = $Jumlah;
            $param_Harga = $Harga;
            $param_Id_pembeli = $Id_pembeli;
            // Attempt to execute the prepared statement
            if(mysqli_stmt_execute($stmt)){
                // Records created successfully. Redirect to landing page
                header("location: index.php");
                exit();
            } else{
                echo "Something went wrong. Please try again later.";
            }
        }

        // Close statement
        mysqli_stmt_close($stmt);
    }

    // Close connection
    mysqli_close($link);
}
 else{
    // Check existence of id parameter before processing further
    if(isset($_GET["Id_pembeli"]) && !empty(trim($_GET["Id_pembeli"]))){
        // Get URL parameter
        $Id_pembeli =  trim($_GET["Id_pembeli"]);
        
        // Prepare a select statement
        $sql = "SELECT * FROM latif WHERE Id_pembeli = ?";
        if($stmt = mysqli_prepare($link, $sql)){
            // Bind variables to the prepared statement as parameters
            mysqli_stmt_bind_param($stmt, "i", $param_Id_pembeli);
            
            // Set parameters
            $param_Id_pembeli = $Id_pembeli;
            
            // Attempt to execute the prepared statement
            if(mysqli_stmt_execute($stmt)){
                $result = mysqli_stmt_get_result($stmt);
    
                if(mysqli_num_rows($result) == 1){
                    /* Fetch result row as an associative array. Since the result set
                    contains only one row, we don't need to use while loop */
                    $row = mysqli_fetch_array($result, MYSQLI_ASSOC);
                    
                    // Retrieve individual field value
                    $nama = $row["nama"];
                    $alamat = $row["alamat"];
                    $HP = $row["HP"];
                    $Tgl_Transaksi = $row["Tgl_Transaksi"];
                    $Jenis_barang = $row["Jenis_barang"];
                    $Nama_Barang = $row["Nama_Barang"];
                    $Jumlah = $row["Jumlah"];
                    $Harga = $row["Harga"];
                } 
                
            } else{
                echo "Oops! Something went wrong. Please try again later.";
            }
        }
        
        // Close statement
        mysqli_stmt_close($stmt);
        
        // Close connection
        mysqli_close($link);
    }  
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Update Record</title>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.css">
    <link rel="stylesheet" href="style.css">
</head>
<body>
    <div class="wrapper">
        <div class="container-fluid">
            <div class="row">
                <div class="col-md-12">
                    <div class="page-header">
                        <h2>Update Record</h2>
                    </div>
                    <p>Please edit the input values and submit to update the record.</p>
                    <form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>" method="post">

                            <div class="form-group <?php echo (!empty($nama_err)) ? 'has-error' : ''; ?>">
                                <label>nama</label>
                                <input type="text" name="nama" class="form-control" value="<?php echo $nama; ?>">
                                <span class="help-block"><?php echo $nama_err;?></span>
                            </div>
                            <div class="form-group <?php echo (!empty($alamat_err)) ? 'has-error' : ''; ?>">
                                <label>alamat</label>
                                <input type="text" name="alamat" class="form-control" value="<?php echo $alamat; ?>">
                                <span class="help-block"><?php echo $alamat_err;?></span>
                            </div>
                            <div class="form-group <?php echo (!empty($HP_err)) ? 'has-error' : ''; ?>">
                                <label>HP</label>
                                <input type="text" name="HP" class="form-control" value="<?php echo $HP; ?>">
                                <span class="help-block"><?php echo $HP_err;?></span>
                            </div>
                            <div class="form-group <?php echo (!empty($Tgl_Transaksi_err)) ? 'has-error' : ''; ?>">
                                <label>Tgl_Transaksi</label>
                                <input type="text" name="Tgl_Transaksi" class="form-control" value="<?php echo $Tgl_Transaksi; ?>">
                                <span class="help-block"><?php echo $Tgl_Transaksi_err;?></span>
                            </div>
                            <div class="form-group <?php echo (!empty($Jenis_barang_err)) ? 'has-error' : ''; ?>">
                                <label>Jenis_barang</label>
                                <input type="text" name="Jenis_barang" class="form-control" value="<?php echo $Jenis_barang; ?>">
                                <span class="help-block"><?php echo $Jenis_barang_err;?></span>
                            </div>
                            <div class="form-group <?php echo (!empty($Nama_Barang_err)) ? 'has-error' : ''; ?>">
                                <label>Nama_Barang</label>
                                <input type="text" name="Nama_Barang" class="form-control" value="<?php echo $Nama_Barang; ?>">
                                <span class="help-block"><?php echo $Nama_Barang_err;?></span>
                            </div>
                            <div class="form-group <?php echo (!empty($Jumlah_err)) ? 'has-error' : ''; ?>">
                                <label>Jumlah</label>
                                <input type="text" name="Jumlah" class="form-control" value="<?php echo $Jumlah; ?>">
                                <span class="help-block"><?php echo $Jumlah_err;?></span>
                            </div>
                            <div class="form-group <?php echo (!empty($Harga_err)) ? 'has-error' : ''; ?>">
                                <label>Harga</label>
                                <input type="text" name="Harga" class="form-control" value="<?php echo $Harga; ?>">
                                <span class="help-block"><?php echo $Harga_err;?></span>
                            </div>
                    
                            <div>
                                <input type="hidden" name="Id_pembeli" value="<?php echo $Id_pembeli; ?>"/>
                                <input type="submit" class="btn btn-primary" value="Submit">
                                <a href="index.php" class="btn btn-default">Cancel</a>                            
                            </div>
                        
                    </form>
                </div>
            </div>
        </div>
    </div>
</body>
</html>
