<!-- VUE JS source from it-->
<script src="https://unpkg.com/vue@3/dist/vue.global.js"></script>
<script src="https://cdn.jsdelivr.net/npm/vue@2.6.14/dist/vue.js"></script>
<!-- Vue JS codes on here-->


<!-- React Sources -->
    <script src= "https://unpkg.com/react@16/umd/react.production.min.js"></script>
<script src= "https://unpkg.com/react-dom@16/umd/react-dom.production.min.js"></script>
<script src="https://unpkg.com/babel-standalone@6.15.0/babel.min.js"></script>

<!-- end-->
<?php
include 'logic.php';
?>

<div class="container mt-5">

<?php foreach($query as $q){?>

<form method="GET">

<input type="text" hidden name="id" value="<?php echo $q['id']; ?>">
<!-- bu kod satırında vue js ile canlı olarak veri görüntülediğimiz sistemin, giriş kısmını yapıyoruz -->

<div id="app">
  <p>{{ message }}</p>
  <!--<p><input v-model="message"></p>-->
  <input type="text" v-model="message" name="title" placeholder="blog title" class="form-control bg-dark text-white text-center" value="<?php echo $q['title']; ?>"><br> 
</div>



<textarea class="form-control bg-dark text-white my-3" name="content" placeholder="Şirket Bilgisi"><?php echo $q['content'];?></textarea><br>

<button class="btn btn-primary btn-dark" name="update">Update</button>

</form>

<?php }?>

</div>
 
<script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js" integrity="sha384-9/reFTGAW83EW2RDu2S0VKaIzap3H66lZH81PoYlFhbGU+6BZp6G7niu735Sk7lN" crossorigin="anonymous"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js" integrity="sha384-B4gt1jrGC7Jh4AgTPSdUtOBvfO8shuf57BaghqFfPlYxofvL8/KUEfYiJOMMV+rV" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-kenU1KFdBIe4zVF0s0G1M5b4hcpxyD9F7jL+jjXkk+Q2h455rYXK/7HAuoJl+0I4" crossorigin="anonymous"></script>
<script src="plugins.js"></script>
<script>
$(window).on("load", function() {
$('body').addClass('loaded');
 });
</script>

<!-- vue js codes-->
<!-- bu scrip sayesinde kullanıcı başlık girerken aynı zamanda ne giriyorsa o şekilde üstünde canlı çıktı alabilicektir, mesaj kısmında title vardır yani canlı olarak veritabanından o veriyi çekmektedir-->
<script>
myObject = new Vue({
  el: '#app',
  data: {message: '<?php echo $q['title']; ?>'}
})
</script>
<!-- Çıktı sona erdi -->

</body>
</html>

