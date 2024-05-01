// // var sidebarOpen=false;
// // var sidebar = document.getElementById("sidebar");

// // function sidebarOpen(){
// //     if(!sidebarOpen){
// //         sidebar.classList.add("sidebar-responsive");
// //         sidebarOpen = true;
// //     }
// // }
// // function sidebarClose(){
// //     if(sidebarOpen){
// //         sidebar.classList.remove("sidebar-responsive");
// //         sidebarOpen = false;
// //     }
// // }
// document.getElementById('add-country-btn').addEventListener('click', function(){
//     document.getElementById('add-country-form').style.display = 'block';
// });
// document.getElementById('cancel-country-btn').addEventListener('click', function() {
//     document.getElementById('add-country-form').style.display = 'none';
// });
// document.getElementById('country-form').addEventListener('submit', function(event){
//     event.preventDefault();

//     const formData=new FormData(this);
//     this.reset();
//     document.getElementById('add-country-form').style.display = 'none';
// });
// document.getElementById('edit-country').addEventListener('click', function(){
//     document.getElementById('add-country-form').style.display = 'block';//duhet hapur form tj me t dhenat e vendosura
// });

// document.getElementById('delete-country').addEventListener('click', function(){
//     if(confirm('Are you sure you want to delete this country?')){
//         alert('Country deleted successfully');
//     }
// });
// ///////////////////////////// 
// document.getElementById('add-destination-btn').addEventListener('click', function(){
//     document.getElementById('add-country-form').style.display = 'block';
// });
// document.getElementById('cancel-destination-btn').addEventListener('click', function() {
//     document.getElementById('add-country-form').style.display = 'none';
// });
// document.getElementById('destination-form').addEventListener('submit', function(event){
//     event.preventDefault();

//     const formData=new FormData(this);
//     this.reset();
//     document.getElementById('add-country-form').style.display = 'none';
// });
// document.getElementById('edit-destination').addEventListener('click', function(){
//     document.getElementById('add-country-form').style.display = 'block';//duhet hapur form tj me t dhenat e vendosura
// });
// //create a confirmation popup if the delete-country button is clicked
// document.getElementById('destination-country').addEventListener('click', function(){
//     if(confirm('Are you sure you want to delete this country?')){
//         alert('Country deleted successfully');
//     }
// });

// document.getElementById('add-tour-btn').addEventListener('click', function(){
//     document.getElementById('add-country-form').style.display = 'block';
// });

// document.getElementById('cancel-tour-btn').addEventListener('click', function() {
//     document.getElementById('add-country-form').style.display = 'none';
// });

// document.getElementById('tour-form').addEventListener('submit', function(event){
//     event.preventDefault();

  
//     const formData = new FormData(this);
//     this.reset();
//     document.getElementById('add-country-form').style.display = 'none';

    
//     for (let pair of formData.entries()) {
//         console.log(pair[0] + ': ' + pair[1]);
//     }
// });

// document.getElementById("add-staff-btn").addEventListener("click", function(){
//     document.getElementById("add-staff-form").style.display = "block";
// });

