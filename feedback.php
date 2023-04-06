<?php include 'header.php'; ?>
<?php 
/**$feedback = [
  [
    'id' => '1',
    'name' => 'Trevor Noah',
    'email' => 'trevor@gmail.com',
    'feedback' => 'Spiral Media is the best'
  ],
  [
    'id' => '2',
    'name' => 'Greg Jackson',
    'email' => 'elon@gmail.com',
    'feedback' => 'Spiral Media my worst'
  ],
  [
    'id' => '3',
    'name' => 'James Green',
    'email' => 'james@gmail.com',
    'feedback' => 'Spiral Media is my favorite'

]
  ]; */
  $sql = 'SELECT * FROM feebac';
  $result = mysqli_query($conn, $sql);
  $feedback = mysqli_fetch_all($result, MYSQLI_ASSOC);

?>
                    <div style="
              max-width: 500px;
              margin: auto; " class= "container">
                        <div class ="row">
                            <div class="col-lg-12 text-center">
                              <h2>What our clients say:</h2>
                    <?php if(empty($feedback)): ?>
                     <p class = "lead mt3"> Ooops! There is no feedback </p>
                    <?php endif ?>
        
                            </div>
                        </div>
                </div>
                <?php foreach ($feedback as $item):?>
                <!-- <div class="container"> -->
                  <div class="container">
                    <div class="card my-3 w-75">
                        <div class="card-body text-center">
                          
                            <legend class ='text-secondary mt-2 text-center'><?php echo $item['name']; ?> </legend>
                            <?php echo $item['feedback']; ?> <br>
                            <p class ='text-secondary mt-2 text-end'>Posted on <?php echo $item['date']; ?></p>

                           
                     
                    </div>
                   </div>
                  </div>
                    <?php endforeach  ?>
            
              <?php include 'footer.php'; ?>