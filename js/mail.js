  // wait for the DOM to be loaded 
$(document).ready(function() { 
            // bind 'myForm' and provide a simple callback function 
            $('#form').ajaxForm(function() {
                $('#Modal3').modal('show');
                $('#form')[0].reset();
            }); 
       
            $('#for2').ajaxForm(function() {
                $('#Modal3').modal('show');
                $('#for2')[0].reset();
            }); 
                        
            $('#for3').ajaxForm(function() {
                $('#Modal3').modal('show');
                $('#for3')[0].reset();
            }); 
            
            $('#for4').ajaxForm(function() {
                $('#Modal3').modal('show');
                $('#for4')[0].reset();
            }); 
            
             $('#form5').ajaxForm(function() {
                $('#Modal3').modal('show');
                $('#myModal').modal('hide');
                $('#form5')[0].reset();
            }); 
            
});

