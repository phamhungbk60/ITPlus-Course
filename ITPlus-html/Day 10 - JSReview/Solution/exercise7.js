$(function() {
  // Button plus clicked
  $("button[name='plus']").click(function() {
    const input = $(this).next()
    const quantity = parseInt(input.val()) + 1
    input.val(quantity)

    //get base price from html for calculation by using custom attribute
    let basePrice = $(this).parent().next().data('baseprice')
    $(this).parent().next().text(`$${calculatePrice(quantity, basePrice)}`)
  })

  // Button minus clicked
  $("button[name='minus']").click(function() {
    const input = $(this).prev()
    let quantity = parseInt(input.val()) - 1
    if (quantity < 1) {
      quantity = 1
    }
    input.val(quantity)

    //get base price from html for calculation by using custom attribute
    let basePrice = $(this).parent().next().data('baseprice')
    $(this).parent().next().text(`$${calculatePrice(quantity, basePrice)}`)
  })

  //change quantity
  $("input[name='qtity']").change(function() {
    let quantity = $(this).val()
    let basePrice = $(this).parent().next().data('baseprice')
    $(this).parent().next().text(`$${calculatePrice(quantity, basePrice)}`)
  })

  //remove item
  $("button[name='delete']").click(function() {
    $(this).parents('.item').remove()
  })

  // check items to show delete selected button
  $("input[type='checkbox']").change(function() {
    let markedForDelete = $("input[type='checkbox']:checked").length
    if (markedForDelete > 0) {
      $(".delete-selected").show()
    } else {
      $(".delete-selected").hide()
    }
  })

  //delete selected
  $(".delete-selected").click(function() {
    $("input[type='checkbox']:checked").parents('.item').remove()
  })

  $(".delete-all").click(function() {
    $('.item').remove()
  })
})

/**
 * A function to calculate total price = quality * price
 * @param {int} quantity 
 * @param {int} basePrice 
 */
function calculatePrice(quantity, basePrice) {
  return quantity * parseInt(basePrice)
}