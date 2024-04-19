$(document).ready(async function () {
  const api = new API()
  const data = await api.getData('data.json')
  console.log('data', data)

  const couple = new Couple()
  let coupleRender = couple.renderCouple(data.couple)
  $(".couple-wrapper").html(coupleRender)

  console.log(data.parents)
  let parents = couple.renderParents(data.parents)
  $(".parents-info").html(parents)
  // console.log(parents)

  console.log(data.gifts['bank-account'])
  let accounts = couple.renderGifts(data.gifts['bank-account'])
  $(".gifts-accounts").html(accounts)
});
