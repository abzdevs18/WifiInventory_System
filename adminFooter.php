	
	</div>
</div>
<script>
var ctx = document.getElementById('myChart');
var chart = new Chart(ctx, {
    type: 'line',
    data: {
        labels: ["January", "February", "March", "April", "May", "June", "July","August","Sept","Oct","Nov","Dec"],
        
            datasets: [{
                label: "Female",
                backgroundColor: 'rgba(255, 99, 132,0.3)',
                borderColor: 'rgb(255, 99, 132)',
                data: [0, 10, 5, 2, 20, 30, 45,30,32,45,40,44],
            },{
                label: "Male",
                backgroundColor: 'rgba(128, 0, 0,0.3)',
                borderColor: '#333',
                data: [13, 4, 13, 23, 12, 2, 1,34,33,25,30,24],
            },{
                label: "Users",
                backgroundColor: 'rgba(0, 191, 255,0.9)',
                borderColor: 'rgb(0, 191, 255)',
                data: [13, 14, 18, 25, 32, 32, 46,64,65,75,70,66],
            }], 
    },
    options: {}
});
</script>
<script>
var ctx = document.getElementById('dough');
var chart = new Chart(ctx, {
    type: 'doughnut',

    data: {
        datasets: [{
        data: [10, 20, 30],
        backgroundColor: ["#C62828", "#2196F3", "#3F51B5"]
    }],
    labels: [
        'Android',
        'IPhone',
        'PC'
    ]
    },
    options: {
    }
});
</script>
<script type="text/javascript">
    function showImage(){
        if(this.files && this.files[0]){
            var obj = new FileReader();
            obj.onload = function(data){
                var image = document.getElementById("image");
                image.src = data.target.result;
                image.style.display = "block";
            }
            obj.readAsDataURL(this.files[0]);
        }
    }
</script>
<?php
	include ('footer.php');
?>