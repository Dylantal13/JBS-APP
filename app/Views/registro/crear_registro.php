<div class="card">
  <div class="card-body">
  <h5 class="card-title">Crear Registro</h5><h1 id="countdown"></h1>
  </div>
</div>

<div class="container mt-5">
  <div class="mt-3">
           


            <?php if($comisiones): ?>
                <select class="selectComisiones" name="comisiones">
            <?php foreach($comisiones as $comision): ?>
           
                <option value="<?php echo $comision['id']; ?>"><?php echo $comision['nombre']; ?></option>
            
            <?php endforeach; ?>
            </select>
            <?php endif; ?>


  </div>
</div>

<script
  src="https://code.jquery.com/jquery-3.6.0.js"
  integrity="sha256-H+K7U5CnXl1h5ywQfKtSj8PCmoN9aaq30gDh27Xc0jk="
  crossorigin="anonymous"></script>

<script>

$(document).ready(function() {
    $('.selectComisiones').select2();
});
</script>
<script>
var end = new Date();
/* end.setMinutes(end.getMinutes() + 1); */
end.setSeconds(end.getSeconds() + 5);

    var _second = 1000;
    var _minute = _second * 60;
    var _hour = _minute * 60;
    var _day = _hour * 24;
    var timer;

    function showRemaining() {
        var now = new Date();
        var distance = end - now;
        if (distance < 0) {
            //alert("se terminó el tiempo de espera");
            clearInterval(timer);
            document.getElementById('countdown').innerHTML = 'Se terminó el tiempo de espera';
            return;
        }
        var days = Math.floor(distance / _day);
        var hours = Math.floor((distance % _day) / _hour);
        var minutes = Math.floor((distance % _hour) / _minute);
        var seconds = Math.floor((distance % _minute) / _second);
/* 
        document.getElementById('countdown').innerHTML = days + ' dias, ';
        document.getElementById('countdown').innerHTML += hours + ' horas, '; */
        document.getElementById('countdown').innerHTML = minutes + ' minutos y ';
        document.getElementById('countdown').innerHTML += seconds + ' segundos';
    }

    timer = setInterval(showRemaining, 1000);
</script>


