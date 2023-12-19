<!-- CategorieDAO.php -->
<?php
require_once 'databasepoo.php';
require_once 'classcategory.php';
require_once 'connexion.php';
require_once 'categorieDAO.php';


// class CategorieDAO
// {
//     private $db;

//     public function __construct()
//     {
//         $this->db = DatabaseConnection::getInstance()->getConnection();
//     }

//     public function getCategoryById($categoryId)
//     {
//         $query = "SELECT * FROM categorie WHERE id = :id";
//         $stmt = $this->db->prepare($query);
//         $stmt->bindParam(':id', $categoryId, PDO::PARAM_INT);
//         $stmt->execute();
//         return $stmt->fetch(PDO::FETCH_ASSOC);
//     }

//     public function getAllCategories()
//     {
//         $query = "SELECT * FROM categorie";
//         $stmt = $this->db->query($query);
//         return $stmt->fetchAll(PDO::FETCH_ASSOC);
//     }

//     public function addCategory(Categorie $category)
//     {
//         $query = "INSERT INTO categorie (nom, description, img)
//                   VALUES (:nom, :description, :img)";

//         $stmt = $this->db->prepare($query);
//         $stmt->bindParam(':nom', $nom);
//         $stmt->bindParam(':description', $description);
//         $stmt->bindParam(':img', $img);

//         $nom = $category->getNom();
//         $description = $category->getDescription();
//         $img = $category->getImg();

//         $stmt->execute();

//         // return $result ? $this->db->lastInsertId() : false;
//     }

//     public function deleteCategory($categoryId)
//     {
//         $query = "DELETE FROM categorie WHERE id = :id";
//         $stmt = $this->db->prepare($query);
//         $stmt->bindParam(':id', $categoryId, PDO::PARAM_INT);
//         $result = $stmt->execute();

//         return $result;
//     }

//     // Add other methods (updateCategory, deleteCategory) as before...
// }
?>









<?php include 'layout/coon.php';



?>

<?php 

if (isset($_POST['submit'])) {
    

  // Retrieve form data
$Nom_Categories = $_POST['Nom_Catégories'];
$Description = $_POST['Description'];


   // Check if file was uploaded without errors
   if (isset($_FILES["image"]) && $_FILES["image"]["error"] == 0) {
      $uploadDir = "Dashboard/photo_Catégories/"; // Directory where you want to save the uploaded images

             // Get file extension
             $fileExtension = pathinfo($_FILES["image"]["name"], PATHINFO_EXTENSION);
        
             // Generate a unique filename
             $uniqueFilename = uniqid('image_', true) . '.' . $fileExtension;
     
             $uploadedFile = $uploadDir . $uniqueFilename;
             $categorieDAO = new CategorieDAO();

// // Add a new category
            $newCategory = new Categorie($Nom_Categories, $Description, $uploadedFile);
            $newCategoryId = $categorieDAO->addCategory($newCategory);
                
      
         
      
      // Move the uploaded file to the specified directory
      if (!move_uploaded_file($_FILES["image"]["tmp_name"], $uploadedFile)) {
        $error_file = "Error uploading the image.";
        $color = "danger";
      } 
  } else {
    $error_file = "Invalid file upload. Please select an image.";
    $color = "danger";
  }
  if (!empty($Nom_Catégories) && !empty($Description) ) {

    if (!empty($uploadedFile)) {
//      $stmt = $conn->prepare("INSERT INTO `categorie` (`Nom`, `Description`, `img`) VALUES (:nom, :description, :img)");
// $stmt->bindParam(':nom', $Nom_Catégories);
// $stmt->bindParam(':description', $Description);
// $stmt->bindParam(':img', $uploadedFile);
// $categoryDAO = new CategorieDAO();
// $category = new Categorie($Nom_Catégories, $Description, $uploadedFile);
// $categoryDAO->addCategory($category);
$categorieDAO = new CategorieDAO();

// // Add a new category
// $newCategory = new Categorie($Nom_Catégories, $Description, $uploadedFile);
// $newCategoryId = $categorieDAO->addCategory($newCategory);


       
    // if (  $stmt->execute()) {
    //   $error_input = "yes";
    //   $color = "success";
    //   $Nom_Catégories = "";
    //   $Description = "";
  

    // }
    }


 

  }else {
    $error_input = "Nom and Description are required.";
    $color = "danger";
  }  
  
  






  

} 



if (!empty($Nom_Catégories) && !empty($Description)) {
    if (!empty($uploadedFile)) {
        $categoryDAO = new CategorieDAO();
        $category = new Categorie($Nom_Catégories, $Description, $uploadedFile);

        if ($categoryDAO->addCategory($category)) {
            $error_input = "yes";
            $color = "success";
            $Nom_Catégories = "";
            $Description = "";
        }
    }
} else {
    $error_input = "Nom and Description are required.";
    $color = "danger";
}


$categoryDAO = new CategorieDAO();
$categorieData = $categoryDAO->getAllCategories();
 


// select sql  
$user_result = $conn->query("SELECT * FROM `categorie`");
$categorieData = $user_result->fetchAll(PDO::FETCH_ASSOC);








?>

<!DOCTYPE html>
<html lang="en">
<head>


<meta charset="utf-8">
<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
<meta name="description" content="">
<meta name="author" content="">
<link href="https://fonts.googleapis.com/css?family=Poppins:100,200,300,400,500,600,700,800,900&display=swap" rel="stylesheet">




<!-- Additional CSS Files -->

<link rel="stylesheet" type="text/css" href="assets/css/font-awesome.css">

<link rel="stylesheet" href="assets/css/hexashop.css">



<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">



    <title>Ajouter Catégories</title>
    <title>Ajouter Catégories</title>
    <style>
     
     @import url('https://fonts.googleapis.com/css2?family=Arvo:ital@1&display=swap');
     *{
  margin: 0;
  padding: 0;
  font-family: 'Arvo', serif;
  
}
.chose {
  text-decoration: none;
  padding: 30px;
  color: #f9f9f9;
  border-radius: 25px;
  
}
.chose:hover{
 
  background-color: #8e8a8a47;
 
}
.active{
  background-color: #8e8a8a47;

}
/* .width{
  width: 21% !important;
} */


.label_file {
	display: block;
	width: 60vw;
	max-width: 300px;

	background-color: slateblue;
	border-radius: 2px;
	font-size: 1em;
	line-height: 2.5em;
	text-align: center;
}
body{
  background-color: #495057;

}
.label_file:hover {
	background-color: cornflowerblue;
}

.label_file:active {
	background-color: mediumaquamarine;
}

#apply {
	border: 0;
    clip: rect(1px, 1px, 1px, 1px);
    height: 1px; 
    margin: -1px;
    overflow: hidden;
    padding: 0;
    position: absolute;
    width: 1px;
}
.img{
  width: 450px !important;
  height: 250px !important;
}


</style>
</head>
<body>

<?php include 'Dashboard\layout_dashboard\navbar_dashboard.php' ?>
  <div class="page-dashboard" id="top">


  <div class=" text-center ">
        <div class="row">
        <div class="col-sm-12 bg-black p-4 " >

        <a class="mb-5 chose"  href="Home.php">Home</a>
         
         <a class="mb-5 chose active"  href="dashboard_Categories.php">Ajouter Catégories</a>
       
        
         <a class="mb-5 chose"  href="dashboard_Products.php">Ajouter Produits</a>
       
         <a class="mb-5 chose"  href="dashboard_Admins.php">Liste des Admins</a>

         <a class="mb-5 chose"  href="dashboard_order.php">Liste des orders</a>

       
        
       
         
         </div>
          <div class="col-sm-12 form">
            <div class="row">
              <form  method="post" enctype="multipart/form-data">
              <div class="col-12 col-sm-12  p-5 text-light text-start">
              <div class="mb-3">
                <label for="exampleFormControlInput1" class="form-label ">Nom de Catégories</label>
                <input name="Nom_Catégories" value="<?php   echo $Nom_Catégories ?? '';  ?>" placeholder="nom..." type="text" class="form-control " id="exampleFormControlInput1" >
              </div>
              <div class="mb-3">
                <label for="exampleFormControlTextarea1" class="form-label  ">Description</label>
                <textarea name="Description"  placeholder="Description..." class="form-control" id="exampleFormControlTextarea1" rows="3"><?php   echo $Description ?? '';  ?></textarea>
              </div> 
              <label class="mb-2" for="">add img</label>
             <div class="row g-0 text-center  ms-1">
           <div class="col-6 col-xl-4">  <label class="label_file col-sm-4" for="apply"><input type="file"  name="image" id="apply" accept="image/*">Get file</label></div>
             </div>
             <?php if (isset($error_file , $_POST['submit'])  ) { ?>
                        <div class="alert alert-<?= $color ?> mt-4" role="alert">
                            <?php echo $error_file; ?>
                        </div> 

                    <?php    } ?> 
             <?php if (isset($error_input , $_POST['submit'])  ) { ?>
                        <div class="alert alert-<?= $color ?> mt-4" role="alert">
                            <?php echo $error_input; ?>
                        </div> 

                    <?php    } ?> 
             <div class="mt-5">
             <button type="submit" name="submit" class="btn btn-success">Ajouter Catégories</button>
        
             </div>
         
                    </form>
              </div>
            
            </div>

            <div class="row">
            <div class="col-12 col-sm-12  p-5 text-light text-start table-responsive">
            <label for="" class="form-label mb-4 ">Liste des Catégories : </label>
            <table class="table table-striped table-hover " >
                <thead >
                    <tr>
                    <th  scope="col">photo</th>
                    <th  scope="col">Nom de Catégories</th>
                    <th  scope="col">Description</th>
                 
                    <th  scope="col">Opérations</th>
                    </tr>
                </thead>
                <tbody class="table-group-divider">
                  <?php foreach ($categorieData as  $value) {   ?>
                    
                 
                    <tr>
                    <td ><img src="<?= $value['img'] ?>" alt="" width="150px" height="154px"></td>
                    <th  scope="row"><?= $value['Nom'] ?></th>
                    <td ><?= $value['Description'] ?></td>
                  
                    <td >
                    <a class="btn btn-success mb-2 ms-2" href="Dashboard/update_categorie.php?id=<?= $value['id'] ?>">update</a>
                   

                  
                   
                    <button onclick="NoneRequest(<?= $value['id'] ?>, this)" class="btn btn-<?php if (is_null($value['deleted_at'])) {
                      echo "info" ;
                    }else {
                      echo "secondary" ;
                    } ?> mb-2 ms-2" type="button" ><div id="result_<?= $value['id'] ?>"><?php if (is_null($value['deleted_at'])) {
                      echo "None" ;
                    }else {
                      echo "Block" ;
                    } ?></div></button>

                    <a class="btn btn-danger mb-2 ms-2 modal-trigger" data-bs-toggle="modal" data-bs-id="<?= $value['id'] ?>" data-bs-name="<?= $value['Nom'] ?>" href="#">delete</a>

                    </td>
                    </tr>
               
              <?php } ?>
              
                </tbody>
                </table>
                <div id="rebons"></div>
            
            
            </div>
          </div>
          </div>
        </div>
      </div>
      </div>
    

<!-- The Modal -->

<!-- Modal -->
<div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog ">
    <div class="modal-content">
      <div class="modal-header">
        <h1 class="modal-title fs-5" id="exampleModalLabel">delete Catégories</h1>
      </div>
      <div class="modal-body">
        
       
      </div>
      <div class="modal-footer">

        
      </div>
    </div>
  </div>
</div>

<?php include 'layout/js.php' ; ?>
<script>
function NoneRequest(id, button) {
  console.log(button.classList) ;
  var xhr = new XMLHttpRequest();
  xhr.open('GET', "Dashboard/masquer_categorie.php?id=" + id, true);

  xhr.onload = function() {
    if (xhr.status >= 200 && xhr.status < 300) {
     
        // Toggle the button text between 'None' and 'Block'
        const buttonText = button.querySelector('#result_' + id);
       
        if (buttonText.innerHTML === 'None') {
        
          buttonText.innerHTML = 'Block';
          button.classList.remove('btn-info');
          button.classList.add('btn-secondary');
        } else {
          buttonText.innerHTML = 'None';
          button.classList.remove('btn-secondary');
          button.classList.add('btn-info');
        }
     
    } else {
      console.error('Request failed');
    }
  };

  xhr.onerror = function() {
    console.error('Request failed');
  };

  xhr.send();
}



</script>

<script>
    // JavaScript to handle modal trigger click event and set the modal target dynamically
    const modalTriggers = document.querySelectorAll('.modal-trigger');
    modalTriggers.forEach((trigger) => {
        trigger.addEventListener('click', (event) => {
            event.preventDefault();
            const id = trigger.getAttribute('data-bs-id');
            const nom = trigger.getAttribute('data-bs-name');
            const modal = document.getElementById('exampleModal');
            const body = modal.querySelector('.modal-body');
            const modalTrigger = modal.querySelector('.modal-footer');
            // Use the fetched 'id' to perform further actions or data retrieval
            modalTrigger.innerHTML = `<button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
            
            <a class="btn btn-success mb-2 ms-2" href="Dashboard/delete_categorie.php?id=${id}">delete</a>
`;
            body.innerHTML = `Do you want to delete : ${nom}`;
            // Set the 'data-bs-target' attribute of the modal dynamically
            modal.setAttribute('data-bs-target', `#exampleModal?id=${id}`);
            // Show the modal
            const myModal = new bootstrap.Modal(modal);
            myModal.show();
        });
    });

</script>
</body>
</html>

<?php  ?>