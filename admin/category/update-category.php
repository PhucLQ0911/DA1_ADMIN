<main class="content">
  <div class="container-fluid p-0">
    <h1 class="h3 mb-3">Update category</h1>
    <div class="row">
      <div class="col-12">
        <div class="card">
          <div class="card-header">
            <h5 class="card-title mb-0">Category</h5>
          </div>
          <div class="card-body">
            <form id="validation-form" method="post" action="?act=addCategory">
              <div class="form-group">
                <label class="form-label">Name category</label>
                <input type="text" class="form-control" name="validation-category-name" placeholder="Name category">
              </div>
              <div class="form-group">
                <label class="form-label">Image</label>
                <div>
                  <input type="file" class="validation-file" name="validation-category-file">
                </div>
              </div>

              <div class="d-flex mt-5 justify-content-center align-item-center">
                <button type="submit" class="btn btn-lg btn-primary" id="toastr-show">
                  Update Category
                </button>
              </div>
            </form>
          </div>
        </div>

      </div>
    </div>

  </div>
</main>

<script>
  // Trigger validation on tagsinput change
  $("input[name=\"validation-bs-tagsinput\"]").on("itemAdded itemRemoved", function() {
    $(this).valid();
  });

  $(function() {
    $("#validation-form").validate({
      rules: {
        "validation-category-name": {
          required: true,
        },
      },
      messages: {
        "validation-category-name": {
          required: "Do not leave the name category blank."
        }
      },
      // Errors
      errorPlacement: function errorPlacement(error, element) {
        var $parent = $(element).parents(".form-group");
        // Do not duplicate errors
        if ($parent.find(".jquery-validation-error").length) {
          return;
        }
        $parent.append(
          error.addClass("jquery-validation-error small form-text invalid-feedback")
        );
      },
      highlight: function(element) {
        var $el = $(element);
        var $parent = $el.parents(".form-group");
        $el.addClass("is-invalid");
      },
      unhighlight: function(element) {
        $(element).parents(".form-group").find(".is-invalid").removeClass("is-invalid");
      }
    });
  });
</script>


<!-- Show notification -->
<script>
  function showToast() {
    var message = "Category";
    var title = "Update category success";
    var type = "success";

    toastr[type](message, title, {
      positionClass: 'toast-top-right',
      closeButton: 'checked',
      progressBar: 'checked',
      newestOnTop: 'checked',
      rtl: $('body').attr('dir') === 'rtl' || $('html').attr('dir') === 'rtl',
      timeOut: 5000,
    });
  }

  function clearToast() {
    toastr.clear();
  }
</script>