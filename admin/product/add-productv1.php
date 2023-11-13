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
                <label class="form-label">Category</label>
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

              <!-- Product attributes -->
              <div id="product_attr_box">
                <div class="d-flex justify-content-between align-items-end">
                  <div>
                    <span>Product attributes</span>
                  </div>
                  <!-- Add more -->
                  <div class="d-flex justify-content-center align-items-end">
                    <label class="form-label"></label>
                    <button type="button" class="btn btn-info" onclick="add_more_attr()">
                      <span id="payment-button-amount">Add More</span>
                    </button>
                  </div>
                </div>

                <div class="row mt-3" id="attr_1">
                  <!-- Price -->
                  <div class="form-group col-lg-2">
                    <label class="form-label">Price</label>
                    <input type="number" name="validation-product-att-price[]" placeholder="Price" class="product-att-price form-control">
                  </div>

                  <!-- Quantity -->
                  <div class="form-group col-lg-2">
                    <label class="form-label">Quantity</label>
                    <input type="number" name="validation-product-att-qty[]" placeholder="Quantity" class="form-control">
                  </div>

                  <!-- Size -->
                  <div class="form-group col-lg-2">
                    <label class="form-label">Size</label>
                    <select class="form-control" name="validation-product-att-size-id[]" id="size_id">
                      <option>S</option>
                      <option>M</option>
                      <option>L</option>
                    </select>
                  </div>

                  <!-- Color -->
                  <div class="form-group col-lg-2">
                    <label class="form-label">Color</label>
                    <select class="form-control" name="validation-product-att-color-id[]" id="color_id">
                      <option value="Color">Color 1</option>
                      <option value="Color">Color 2</option>
                      <option value="Color">Color 3</option>
                    </select>
                  </div>

                  <!-- Image -->
                  <div class="form-group col-lg-2">
                    <label class="form-label">Image</label>
                    <input type="file" name="validation-product-att-image[]" class="validation-file">
                  </div>

                </div>
              </div>

              <div class="d-flex mt-5 justify-content-center align-item-center">
                <button type="submit" name="submit" class="btn btn-lg btn-primary">Submit</button>
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
          required: true,
          extension: "jpg|jpeg|png"
        },
        "validation-product-price": {
          required: true
        },
        "validation-product-description": {
          required: true
        },
        "validation-product-att-price[]": {
          required: true
        },
        "validation-product-att-qty[]": {
          required: true
        },
        "validation-product-att-image[]": {
          required: true
        }
      },
      messages: {
        "validation-product-name": {
          required: "Do not leave the name product blank."
        },
        "validation-product-file": {
          required: "Do not leave the image blank.",
          extension: "Please upload file in these format only (jpg, jpeg, png)."
        },
        "validation-product-price": {
          required: "Do not leave the price blank."
        },
        "validation-product-description": {
          required: "Do not leave the description blank."
        },
        "validation-product-att-price[]": {
          required: "Do not leave the price attribute blank."
        },
        "validation-product-att-qty[]": {
          required: "Do not leave the quantity attribute blank."
        },
        "validation-product-att-image[]": {
          required: "Do not leave the image attribute blank."
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
      },
    });

    // Pro ATT

  });
</script>

<script>
  var attr_count = 1;

  function addValidation() {
    $(".product-att-price").each((i, e) => {
      $(e).rules("add", {
        required: true
      })
    });
  }

  function add_more_attr() {
    attr_count++;
    var size_html = jQuery('#attr_1 #size_id').html();
    var color_html = jQuery('#attr_1 #color_id').html();
    var html = `<div class="row mt-3" id="attr_${attr_count}">
                  <!-- Price -->
                  <div class="form-group col-lg-2">
                    <label class="form-label">Price</label>
                    <input type="number" name="validation-product-att-price[]" placeholder="Price" class="product-att-price form-control">
                  </div>

                  <!-- Quantity -->
                  <div class="form-group col-lg-2">
                    <label class="form-label">Quantity</label>
                    <input type="number" name="validation-product-att-qty[]" placeholder="Quantity" class="form-control">
                  </div>

                  <!-- Size -->
                  <div class="form-group col-lg-2">
                    <label class="form-label">Size</label>
                    <select class="form-control" name="validation-product-att-size-id[]" id="size_id">
                      ${size_html}
                    </select>
                  </div>

                  <!-- Color -->
                  <div class="form-group col-lg-2">
                    <label class="form-label">Color</label>
                    <select class="form-control" name="validation-product-att-color-id[]" id="color_id">
                      ${color_html}
                    </select>
                  </div>

                  <!-- Image -->
                  <div class="form-group col-lg-2">
                    <label class="form-label">Image</label>
                    <input type="file" name="validation-product-att-image[]" class="validation-file">
                  </div>
                  <div class="form-group col-lg-2 d-flex justify-content-center align-items-end ">
                    
                    <button id="" type="button" class="btn btn-danger px-4" onclick=remove_attr(${attr_count})>
                      <span id="payment-button-amount">Remove</span>
                    </button>
                  </div>
                </div>`;
    jQuery('#product_attr_box').append(html);
    addValidation();
  }

  function remove_attr(attr_count) {
    jQuery('#attr_' + attr_count).remove();
  }
</script>