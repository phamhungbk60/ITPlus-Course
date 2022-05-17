function inputIsBlank (string) {
  if (string.trim().length === 0) {
    return true
  }
  return false
}

function inputIsText (number) {
  if (Number.isNaN(number)) {
    return true
  }
  return false
}