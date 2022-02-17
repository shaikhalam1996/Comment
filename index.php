<?php
session_start();
// session_destroy();
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="bootstrap/dist/css/bootstrap.min.css">
    <title>Document</title>
</head>
<body>

<!-- Modal -->
<div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Modal title</h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body">
        
      <form action="backend.php" method="post">
  <div class="mb-3">
    <label for="exampleInputread1" class="form-label">Email address</label>
    <input type="email" class="form-control" name="Email" id="email" aria-describedby="emailHelp">
    <div id="emailHelp" class="form-text">We'll never share your email with anyone else.</div>
  </div>
  <div class="mb-3">
    <label for="exampleInputPassword1" class="form-label">Password</label>
    <input type="password" class="form-control" name="Password" id="password">
  </div>

  <div id="error_msg" class="mb-3 text-danger"></div>
  
  <button type="submit" id="btn_submit" class="btn btn-primary">Submit</button>
</form>
      </div>
     
    </div>
  </div>
</div>

<nav class="navbar navbar-expand-lg navbar-dark bg-dark">
  <div class="container-fluid">
    <a class="navbar-brand" href="#">Navbar</a>
    <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse" id="navbarSupportedContent">
      <ul class="navbar-nav ms-auto mb-2 mb-lg-0">
        <li class="nav-item">
          <a class="nav-link" aria-current="page" href="logout.php">Logout</a>
        </li>
        <li class="nav-item">
            <?php
            if(!isset($_SESSION['email'])){

                echo '<a class="nav-link" href="#" aria-current="page" data-bs-toggle="modal" data-bs-target="#exampleModal">Login</a>';
            }else{
                echo '<a class="nav-link" href="#">'.$_SESSION['email'].'</a>';
            }
        ?>
          </li>
        
      </ul>
     
    </div>
  </div>
</nav>


<div class="py-5">
  <div class="container">
    <div class="row justify-content-center">
      <div class="col-lg-8">
        <div class="card">
          <div class="card-header">
            <h3>This Is Heading</h3>
          </div>
          <div class="card-body">
            <p>Lorem ipsum dolor, sit amet consectetur adipisicing elit. Voluptatibus atque vitae commodi vel. Placeat consectetur quod mollitia praesentium recusandae sed omnis voluptatibus odit dignissimos nulla totam, aliquam exercitationem commodi rerum.
            Voluptas mollitia, tenetur quae deleniti doloribus, maiores debitis assumenda in esse fugiat adipisci expedita fuga quasi autem non blanditiis aut excepturi! Commodi voluptatibus optio rem incidunt illo labore, velit est.
            Molestias quidem numquam provident soluta excepturi cupiditate natus, reiciendis labore tempora illum facilis, praesentium amet quis inventore minus dolores nesciunt. Similique nulla odit animi. Magnam veritatis pariatur saepe odio perspiciatis.
            Corrupti distinctio velit vel esse illo corporis praesentium accusantium animi, quaerat maiores facere repellendus ad! Officiis odit veritatis exercitationem laborum tempore recusandae. Deserunt harum placeat consectetur voluptatem. Distinctio, eaque possimus!
            Delectus hic ullam aliquid magnam soluta, est eius animi quas accusantium nesciunt eveniet, consequatur id sit saepe? Dignissimos, saepe magni distinctio aliquid sunt consequuntur rem porro provident nulla? Temporibus, sint!</p>
         <hr>
         <div class="main_comment">
           <textarea name="comment" id="comment" class="form-control"></textarea>
           <button class="btn btn-primary my-2" id="btn_comment">Comment</button>
         </div>

         <div class="comment_container">

         </div>
          </div>
        </div>
      </div>
    </div>
  </div>
</div>


<script src="https://code.jquery.com/jquery-3.6.0.js" integrity="sha256-H+K7U5CnXl1h5ywQfKtSj8PCmoN9aaq30gDh27Xc0jk=" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.10.2/dist/umd/popper.min.js" integrity="sha384-7+zCNj/IqJ95wo16oMtfsKbZ9ccEh31eOz1HGyDuCQ6wgnyJNSYdrPa03rtR1zdB" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.min.js" integrity="sha384-QJHtvGhmr9XOIpI6YVutG+2QOK9T+ZnN4kzFN1RtK3zEFEIsxhlmWl5/YESvpZ13" crossorigin="anonymous"></script>
<script>
    // $("#btn_submit").click(function(e){
    //     e.preventDefault();
    //     let email = $('#email').val();
    //     let password = $('#password').val();

    //     $.ajax({
    //         url:"backend.php",
    //         method:"POST",
    //         data:{Email:email,Password:password},
    //         success:function(data){
    //             if(data === 'Success'){
    //             $('#exampleModal').modal('hide');
    //             }else{
                    
    //             $('#error_msg').html(data)
    //             }
    //         }
    //     })

    $(document).ready(function(){
    load_comment()
})

    function load_comment(){
          $.ajax({
            url:"comment.php",
            method:"POST",
            data:{'read':read},
            success:function(res){
               $('.comment_container').html(res)
            }
        })
    }


    $("#btn_comment").click(function(e){
        e.preventDefault();
        let comment = $('#comment').val();
       

        $.ajax({
            url:"comment.php",
            method:"POST",
            data:{comment:comment},
            success:function(data){
                // if(data === 'Success'){
                // $('#exampleModal').modal('hide');
                // }else{
                    
                // $('#error_msg').html(data)
                // }
                alert(data)
                load_comment()
            }
        })

    })
</script>
</body>
</html>