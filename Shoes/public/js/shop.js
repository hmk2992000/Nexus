		//Price Filter
    $(function() {
      $("#price-range").slider({
        range: true,
        min: 50,
        max: 500,
        values: [50, 500],
        slide: function(event, ui) {
          $("#price-show").html("$" + ui.values[0] + " - $" + ui.values[1]);
          $('#hidden_minimum_price').val(ui.values[0]);
          $('#hidden_maximum_price').val(ui.values[1]);
        }
      });
      $("#priceRange").val("$" + $("#price-range").slider("values", 0) + " - $" + $("#price-range").slider("values", 1));
    });