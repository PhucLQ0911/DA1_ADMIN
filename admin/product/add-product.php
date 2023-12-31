<main class="content">
  <div class="container-fluid p-0">
    <h1 class="h3 mb-3">Add product</h1>
    <div class="row">
      <div class="col-12">
        <div class="card">
          <div class="card-header">
            <h5 class="card-title mb-0">Product</h5>
          </div>
          <div class="card-body">
            <form id="validation-form">
              <div class="form-group">
                <label class="form-label">Name product</label>
                <input type="text" class="form-control" name="validation-product-name" placeholder="Name product">
              </div>

              <div class="form-group">
                <label class="form-label">Select</label>
                <select class="form-control" name="validation-product-select">
                  <option value="pitons">Pitons</option>
                  <option value="cams">Cams</option>
                  <option value="nuts">Nuts</option>
                  <option value="bolts">Bolts</option>
                  <option value="stoppers">Stoppers</option>
                  <option value="sling">Sling</option>
                </select>
              </div>

              <div class="form-group">
                <label class="form-label">Image</label>
                <div>
                  <input type="file" class="validation-file" name="validation-product-file">
                </div>
              </div>

              <div class="form-group">
                <label class="form-label">Price</label>
                <input type="number" class="price form-control" name="validation-product-price" placeholder="Price">
              </div>

              <div class="form-group">
                <label class="form-label">Description</label>
                <textarea class="form-control" name="validation-product-description"></textarea>
              </div>

              <div class="d-flex mt-5 justify-content-center align-item-center">
                <button type="submit" class="btn btn-lg btn-primary" id="toastr-show">
                  Add Product
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
  $(function() {
    // Trigger validation on tagsinput change
    $("input[name=\"validation-bs-tagsinput\"]").on("itemAdded itemRemoved", function() {
      $(this).valid();
    });
    // Initialize validation
    $("#validation-form").validate({
      rules: {
        "validation-product-name": {
          required: true
        },
        "validation-product-file": {
          required: true
        },
        "validation-product-price": {
          required: true
        },
        "validation-product-description": {
          required: true
        }
      },
      messages: {
        "validation-product-name": {
          required: "Do not leave the name product blank."
        },
        "validation-product-file": {
          required: "Do not leave the image blank."
        },
        "validation-product-price[]": {
          required: "Do not leave the price blank."
        },
        "validation-product-description": {
          required: "Do not leave the description blank."
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
        // Select2 and Tagsinput
        if ($el.hasClass("select2-hidden-accessible") || $el.attr("data-role") === "tagsinput") {
          $el.parent().addClass("is-invalid");
        }
      },
      unhighlight: function(element) {
        $(element).parents(".form-group").find(".is-invalid").removeClass("is-invalid");
      }
    });
  });
</script>


<!-- Show notification -->
<script>
  // Toastr
  $(function() {
    var currentMessageIndex = -1;
    $('#toastr-show').click(function() {
      var message = "Category";
      var title = "Add product success";
      var type = "success";

      toastr[type](message, title, {
        positionClass: 'toast-top-right',
        closeButton: 'checked',
        progressBar: 'checked',
        newestOnTop: 'checked',
        rtl: $('body').attr('dir') === 'rtl' ||
          $('html').attr('dir') === 'rtl',
        timeOut: 5000,
      });
    });

    $('#toastr-clear').on('click', function() {
      toastr.clear();
    });
  });
</script>