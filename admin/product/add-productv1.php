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
                <input type="number" class="price form-control" name="validation-product-price[]" placeholder="Price">
              </div>
              <div class="form-group">
                <label class="form-label">Price</label>
                <input type="number" class="price form-control" name="validation-product-price[]" placeholder="Price">
              </div>
              <div class="form-group">
                <label class="form-label">Price</label>
                <input type="number" class="price form-control" name="validation-product-price[]" placeholder="Price">
              </div>

              <div class="form-group">
                <label class="form-label">Description</label>
                <textarea class="form-control" name="validation-product-description"></textarea>
              </div>

              <!-- Product attributes -->
              <div class="form-group" id="product_attr_box">
                <span>Product attributes</span>
                <div class="row mt-3" id="attr_1">
                  <!-- Price -->
                  <div class="col-lg-2">
                    <label class="form-label">Price</label>
                    <input type="number" name="validation-product-price" placeholder="Price" class="form-control" required>
                  </div>

                  <!-- Quantity -->
                  <div class="col-lg-2">
                    <label class="form-label">Quantity</label>
                    <input type="number" name="qty[]" placeholder="Quantity" class="form-control" value="">
                  </div>

                  <!-- Size -->
                  <div class="col-lg-2">
                    <label class="form-label">Size</label>
                    <select class="form-control" name="size_id[]" id="size_id">
                      <option>S</option>
                      <option>M</option>
                      <option>L</option>
                    </select>
                  </div>

                  <!-- Color -->
                  <div class="col-lg-2">
                    <label class="form-label">Color</label>
                    <select class="form-control" name="color_id[]" id="color_id">
                      <option value="Color">Color 1</option>
                      <option value="Color">Color 2</option>
                      <option value="Color">Color 3</option>
                    </select>
                  </div>

                  <!-- Image -->
                  <div class="col-lg-2">
                    <label class="form-label">Image</label>
                    <input type="file" name="qty[]" class="validation-file">
                  </div>

                  <!-- Add more -->
                  <div class="col-lg-2 d-flex justify-content-center align-items-end">
                    <label class="form-label"></label>
                    <button type="button" class="btn btn-info" onclick="add_more_attr()">
                      <span id="payment-button-amount">Add More</span>
                    </button>
                  </div>

                </div>
              </div>

              <div class="d-flex mt-5 justify-content-center align-item-center">
                <button type="submit" class="btn btn-lg btn-primary">Submit</button>
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
    // addValidationRules();
    // Trigger validation on tagsinput change
    $("input[name=\"validation-bs-tagsinput\"]").on("itemAdded itemRemoved", function() {
      $(this).valid();
    });
    // Initialize validation
    $("#validation-form").validate({
      rules: {
        "validation-product-name": {
          required: true,
          email: true
        },
        "validation-product-file": {
          required: true
        },
        "validation-product-price[]": {
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

  // function addValidationRules() {
  //   $(".price").each((i, e) => {
  //     $(e).rules("add", {
  //       required: true
  //     })
  //   });
  // }
</script>

<script>
  var attr_count = 1;

  function add_more_attr() {
    attr_count++;

    var size_html = jQuery('#attr_1 #size_id').html();
    var color_html = jQuery('#attr_1 #color_id').html();
    var html = `<div class="row mt-3" id="attr_${attr_count}">
        <div class="col-lg-2">
          <label class="form-label">Price</label>
          <input type="text" name="validation-product-price" placeholder="Price" class="form-control"  value="">
        </div>
        <div class="col-lg-2">
          <label  class=" form-control-label">Quantity</label>
          <input type="text" name="qty[]" placeholder="Quantity" class="form-control" value="">
        </div>
        <div class="col-lg-2">
          <label  class=" form-label">Size</label>
          <select class="form-control" id="size_id" name="size_id[]">
          ${size_html}
          </select>
        </div>
        <div class="col-lg-2">
          <label class=" form-label">Color</label>
          <select class="form-control" id="color_id" name="color_id[]">
          ${color_html}
          </select>
        </div>
        <div class="col-lg-2">
          <label class=" form-control-label">Image</label>
          <input type="file" name="qty[]"  class="validation-file"  >
        </div>
        <div class="col-lg-2 d-flex justify-content-center align-items-end ">
          <label  class="form-label">&nbsp;</label>
          <button id="" type="button" class="btn btn-danger px-4" onclick=remove_attr("${attr_count}")><span id="payment-button-amount">Remove</span>
          </button>
        </div>
      </div>`;
    jQuery('#product_attr_box').append(html);
  }

  function remove_attr(attr_count) {
    jQuery('#attr_' + attr_count).remove();
  }
</script>