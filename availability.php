<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-F3w7mX95PdgyTmZZMECAngseQB83DfGTowi0iMjiWaeVhAn4FJkqJByhZMI3AhiU" crossorigin="anonymous">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Fira+Sans:ital@1&display=swap" rel="stylesheet">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>

    <title>Availability | ZENTrek</title>
    <link rel="stylesheet" href="cas.css">
</head>
<body>
    <!-- Header Section -->
    <header>
        <h1>Check Guide Availability</h1>
        <p>Select a date to check the availability of your guide.</p>
    </header>
<br>
    <!-- Availability Form Section -->
    <section class="availability-section">
        <form id="availability-form" action="check_availability.php" method="POST" onsubmit="checkAvailability(event)">
            <label for="guide">Select Guide:</label>
            <select id="guide" name="guide" required>
                <option value="" disabled selected>Select a guide</option>
                <option value="Praveen Mendis">Praveen Mendis</option>
                <option value="Charles Andrew">Charles Andrew</option>
                <option value="Chinthaka Hatharasingha">Chinthaka Hatharasingha</option>
                <option value="Amith de Silva">Amith de Silva</option>
                <option value="Anthony Prageeth">Anthony Prageeth</option>
                <option value="Janaka Rupasinghe">Janaka Rupasinghe</option>
                <option value="Mohamed Fazil Mohamed">Mohamed Fazil Mohamed</option>
                <option value="Dilhan Suraweera">Dilhan Suraweera</option>
                <option value="Sujith Jayathunga">Sujith Jayathunga</option>
                <option value="Henry Lional">Henry Lional</option>
                <option value="Prasanna Lal">Prasanna Lal</option>
                <option value="Irosh Galagedara">Irosh Galagedara</option>
                <option value="Ruwan Kalathunga">Ruwan Kalathunga</option>
                <option value="Dileepa Weerasuriya">Dileepa Weerasuriya</option>
                <option value="Dhanushka Rathnayaka">Dhanushka Rathnayaka</option>
            </select>

            <label for="sdate">Select Start Date:</label>
            <input type="date" id="sdate" name="sdate" required>

            <label for="edate">Select End Date:</label>
            <input type="date" id="edate" name="edate" required>

            <button type="submit" class="check-availability-btn">Check Availability</button>
        </form>
        
        <div id="availability-result"></div> <!-- For displaying results -->
    </section>
<br><br>
     <!--footer2-->

<footer class="footer2">
 
 <div class="footer-container">
     <div class="footer-section">
         <h3>GovermentHelp</h3>
         <ul>
             <li><a href="http://tourismmin.gov.lk/" target="_blank">Ministry of Tourism & Lands</a></li>
             <li><a href="https://www.sltda.gov.lk/" target="_blank">Sri Lanka Tourism Development Authority</a></li>
             <li><a href="https://www.slithm.edu.lk/" target="_blank">Sri Lanka Institute of Tourism & Hotel Management </a></li>
             <li><a href="https://www.airport.lk/" target="_blank">Sri Lanka Airport & Aviation Services</a></li>
             <li><a href="https://www.immigration.gov.lk/" target="_blank">Department of Immigration and Emigration</a></li>
             
         </ul>
     </div>
     <div class="footer-section">
         <h3>EmergencyCall</h3>
         <ul>
             <li><a href="#">Tourist Police: 0112 421 281</a></li>
             <li><a href="#">Police Emergency (Colombo): 0112 433 333</a></li>
             <li><a href="#">Police Emergency: 119</a></li>
             <li><a href="#">Ambulance Service: 1990 (Suwasariya Ambulance Service)</a></li>
             <li><a href="#">Accident Service-General Hospital-Colombo: 011-2691111</a></li>
             <li><a href="#">Report Crimes: 011-2691500</a></li>
             <li><a href="#">Srilankan Tourism Development Authority: 1912</a></li>
         </ul>
     </div>
     <div class="footer-section">
         <h3>Follow Us</h3>
         <ul>
             <li><a href="#">Facebook <ion-icon name="logo-facebook"></ion-icon></a></li>
             <li><a href="#">Instagram <ion-icon name="logo-instagram"></ion-icon></a></li>
             <li><a href="#">Twitter <ion-icon name="logo-twitter"></ion-icon></a></li>
             <li><a href="#">YouTube <ion-icon name="logo-youtube"></ion-icon></a></li>
         </ul>
     </div>
    
 </div>
<!--devo-->

<hr class="w-50 mt-5 mx-auto text-dark">
<div class="container last-footer" >
   <div class="row">
       <div class="col-lg-4 col-md-4 col-12 mx-auto Copyright">
           <h4 id="last-logo">ZENTrek Agency</h4> 
       </div>
       <div class="col-lg-4 col-md-4 col-12 mx-auto Copyright">
           <h4><span id="Name">ZENTrek Agency</span> © Privacy Policy</h4>
       </div>
       <div class="col-lg-4 col-md-4 col-12 mx-auto Copyright">
           <h4>Developed by <span id="Name">Group7.</span></h3>
       </div>
   </div>
</div>
</section>

</footer>
<script src="https://unpkg.com/ionicons@5.4.0/dist/ionicons.js"></script> <!--sociel media logo-->
    <script>
        function checkAvailability(event) {
            event.preventDefault(); // Prevent the form from submitting normally
            
            const formData = new FormData(document.getElementById('availability-form'));

            fetch('check_availability.php', {
                method: 'POST',
                body: formData,
            })
            .then(response => response.json())
            .then(data => {
                // Display the message in the availability result div
                document.getElementById('availability-result').innerHTML = <p>${data.message}</p>;
            })
            .catch(error => console.error('Error:', error));
        }
    </script>
     
</body>
</html>