    <!-- Footer -->
    <footer class="text-white" id="footer">
        <div class="container">
            <div class="row">
                <div class="col text-center">
                    <div class="py-4">
                        <h1 class="h3">Village88</h1>
                        <p>Copyright &copy; 2021</p>
                    </div>
                </div>
            </div>
        </div>
    </footer>
    <!-- bootstrap scripts-->
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js" integrity="sha384-9/reFTGAW83EW2RDu2S0VKaIzap3H66lZH81PoYlFhbGU+6BZp6G7niu735Sk7lN" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.0/dist/js/bootstrap.min.js" integrity="sha384-+YQ4JLhjyBLPDQt//I+STsc9iw4uQqACwlvpslubQzn4u2UU2UFM80nGisd026JF" crossorigin="anonymous"></script>
    <!-- jquery datatable script -->
    <script src="//cdn.datatables.net/1.10.24/js/jquery.dataTables.min.js"></script>
    <script>
        $(document).ready( function () {
            var table = $('#myTable').DataTable( {
            pageLength : 5,
            lengthMenu: [[5, 10, 20, 25], [5, 10, 20, 25]]
            } )
        } );
    </script>
    <script>
        $(document).ready(function(){       
            $('#welcomeUser').modal('show');
        }); 
    </script>
</body>
</html>