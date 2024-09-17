        
        <footer class="footer text-center">
          All Rights Reserved by Ispark Data Connect and Developed by
          <a href="https://www.dialdesk.in">Dialdesk</a>.
        </footer>


        <script>
          function update_status(user)
          {
            var button = $('.btn-toggle');
            var isPressed = button.attr('aria-pressed') === 'true';
            var newStatus = isPressed ? 'INACTIVE' : 'ACTIVE';
            
            $.ajax({
                type: 'POST',
                url: 'update_status.php',
                data: { user:user,status: newStatus },
                success: function(response) {
                    //alert(response);  
                },
                error: function(xhr, status, error) {
                    console.error('Error:', error);  
                }
            });

          }

          // function update_agent_status(taskaction)
          // {
          //   console.log("hello");
          // }
        </script>

  