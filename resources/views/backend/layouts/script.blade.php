<!-- jQuery -->
<script src="{{ asset ('backend/vendor/jquery/jquery.min.js') }}"></script>

<!-- Bootstrap Core JavaScript -->
<script src="{{ asset ('backend/vendor/bootstrap/js/bootstrap.min.js') }}"></script>

<!-- Metis Menu Plugin JavaScript -->
<script src="{{ asset ('backend/vendor/metisMenu/metisMenu.min.js') }}"></script>

 <!-- DataTables JavaScript -->
 <script src="{{ asset ('backend/vendor/datatables/js/jquery.dataTables.min.js') }}"></script>
 <script src="{{ asset ('backend/vendor/datatables-plugins/dataTables.bootstrap.min.js') }}"></script>
 <script src="{{ asset ('backend/vendor/datatables-responsive/dataTables.responsive.js') }}"></script>
 {{-- <script src="https://cdn.datatables.net/1.13.4/js/jquery.dataTables.min.js"></script> --}}
 {{-- <script src="{{ asset ('backend/vendor/datatables/js1/jquery-3.5.1.js') }}"></script> --}}
 <script src="{{ asset ('backend/vendor/datatables/js1/jquery.dataTables.min.js') }}"></script>
 <script src="{{ asset ('backend/vendor/datatables/js1/dataTables.buttons.min.js') }}"></script>
 <script src="{{ asset ('backend/vendor/datatables/js1/jszip.min.js') }}"></script>
 <script src="{{ asset ('backend/vendor/datatables/js1/pdfmake.min.js') }}"></script>
 <script src="{{ asset ('backend/vendor/datatables/js1/vfs_fonts.js') }}"></script>
 <script src="{{ asset ('backend/vendor/datatables/js1/buttons.html5.min.js') }}"></script>
 <script src="{{ asset ('backend/vendor/datatables/js1/buttons.print.min.js') }}"></script>

<!-- Morris Charts JavaScript -->
<script src="{{ asset ('backend/vendor/raphael/raphael.min.js') }}"></script>
<script src="{{ asset ('backend/vendor/morrisjs/morris.min.js') }}"></script>
<script src="{{ asset ('backend/data/morris-data.js') }}"></script>

<!-- Select 2 -->
<script src="{{ asset ('backend/vendor/select2/select2.min.js') }}"></script>

<!-- Custom Theme JavaScript -->
<script src="{{ asset ('backend/dist/js/sb-admin-2.js') }}"></script>

<!-- Page-Level Demo Scripts - Tables - Use for reference -->
<script>
// $(document).ready(function() {
//     $('#dataTables-example').DataTable({
//         responsive: true
//     });
// });
$(document).ready(function() {
    $('#dataTables-example').DataTable( {
        dom: 'Blfrtip'
    } );
} );
</script>

<script>
    var loadFile = function(event) {
	var image = document.getElementById('output');
	image.src = URL.createObjectURL(event.target.files[0]);
    };
</script>

<script>
    $(".multiple-select").select2({
    // maximumSelectionLength: 2
    });

</script>


<script type="text/javascript">
  // $(document).ready(function() {
  //   // When click show issue
  //   $('body').on('click', '#show-book', function() {
  //     var issueURL = $(this).data('url');
  //     $.get(issueURL, function(data) {
  //       // Clear existing list items
  //       $('#issue-list').empty();

  //       // Iterate through each issue in the response data
  //       $.each(data, function(index, issue) {
  //         // Create a new list item
  //         console.log(issue);
  //         var listItem = $('<li>').text(issue.id);
  //         // Append the list item to the issue list
  //         $('#issue-list').append(listItem);
  //       });

  //       $('#userShowModal').modal('show');
  //     });
  //   });
  // });
  function loadIssueLists(url) {
  fetch(url)
    .then(response => response.json())
    .then(data => {
      // Clear previous content
      document.getElementById('issue-list').innerHTML = '';

      // Loop through the data and create HTML elements
      data.data.forEach(data => {
        var bookId = data.book_name;

        var issueListElement = document.createElement('li');
        issueListElement.textContent = bookId;

        document.getElementById('issue-list').appendChild(issueListElement);
      });

      // Show the modal
      $('#userShowModal').modal('show');  
    })
    .catch(error => {
      console.error('Error:', error);
    });
}

</script>
