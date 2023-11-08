<main class="content">
  <div class="container-fluid p-0">

    <h1 class="h3 mb-3">List User</h1>

    <div class="row">
      <div class="col-12">
        <div class="card">

          <!-- Header -->
          <div class="card-header">
            <h5 class="card-title">Responsive Table</h5>
            <h6 class="card-subtitle text-muted">
              Highly flexible tool that many advanced features to any HTML table.
            </h6>
          </div>

          <!-- Data -->
          <div class="card-body">
            <table id="datatables-basic" class="table table-striped" style="width:100%">
              <thead>
                <tr>
                  <th>ID</th>
                  <th>User name</th>
                  <th>Full name</th>
                  <th>Phone</th>
                  <th>Email</th>
                  <th>Image</th>
                  <th>Address</th>
                  <th>Role</th>
                  <th>Action</th>
                </tr>
              </thead>

              <tbody>
                <tr>
                  <td>1</td>
                  <td>1</td>
                  <td>1</td>
                  <td>1</td>
                  <td>1</td>
                  <td>Smartphone</td>
                  <td><img src="" alt="...image cate"></td>
                  <td>Hidden</td>
                  <td>
                    <div class="text-center">
                      <a href="?act=updateUser" class="btn btn-warning ">
                        Update
                      </a>
                      <button type="button" class="btn btn-danger deleteUser" data-toggle="modal" data-target="#defaultModalDanger" data-ds-id="1">
                        Delete
                      </button>
                    </div>
                  </td>
                </tr>
                <tr>
                  <td>2</td>
                  <td>2</td>
                  <td>2</td>
                  <td>2</td>
                  <td>2</td>
                  <td>T-Shirt</td>
                  <td><img src="" alt="...image cate"></td>
                  <td>Show</td>
                  <td>
                    <div class="text-center">
                      <a href="?act=updateUser" class="btn btn-warning ">
                        Update
                      </a>
                      <!-- BEGIN danger modal -->
                      <button type="button" class="btn btn-danger deleteUser" data-toggle="modal" data-target="#defaultModalDanger" data-ds-id="2">
                        Delete
                      </button>
                      <!-- END danger modal -->
                    </div>
                  </td>
                </tr>

                <tr>
                  <td>3</td>
                  <td>3</td>
                  <td>3</td>
                  <td>3</td>
                  <td>3</td>
                  <td>Dress</td>
                  <td><img src="" alt="...image cate"></td>
                  <td>Show</td>
                  <td>
                    <div class="text-center">
                      <a href="?act=updateUser" class="btn btn-warning">
                        Update
                      </a>
                      <button type="button" class="btn btn-danger deleteUser" data-toggle="modal" data-target="#defaultModalDanger" data-ds-id="3">
                        Delete
                      </button>
                    </div>
                  </td>
                </tr>
              </tbody>
            </table>
          </div>
        </div>
      </div>
    </div>

  </div>
</main>


<script>
  $(function() {
    // Datatables basic
    $("#datatables-basic").DataTable({
      responsive: true
    });
  });
</script>

<!-- Confirm delete -->
<div class="modal fade" id="defaultModalDanger" tabindex="-1" role="dialog" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title">Default modal</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body m-3">
        <p class="mb-0">
          Use Bootstrap’s JavaScript modal plugin to add
          dialogs to your site for lightboxes, user
          notifications, or completely custom content.
        </p>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">
          Close
        </button>
        <a href="" class="btn btn-danger" id="btn-delete">
          Save changes
        </a>
      </div>
    </div>
  </div>
</div>


<script>
  $('.deleteUser').on('click', function() {
    var id = $(this).data('ds-id');
    console.log(id);
    var link = `?act=deleteUser&idUser=${id}`
    document.getElementById("btn-delete").setAttribute("href", link)
  });
</script>