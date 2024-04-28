$(document).ready(async function () {
  const api = new API()
  const data = await api.getData('data.json')
  console.log('data', data)


  const couple = new Couple()
  let coupleRender = couple.renderCouple(data.couple)
  $(".couple-wrapper").html(coupleRender)


  let weddingDateRender = couple.renderWeddingDate(data.weddingDate)
  $(".weddingdate").html(weddingDateRender)


  //console.log(data.parents)
  let parents = couple.renderParents(data.parents)
  $(".parents-info").html(parents)


  let locationRender = couple.renderLocation(data.itinerary)
  $(".locations").html(locationRender)


  
  let gifts = couple.renderGifts(data.gifts)
  $(".couple-gift").html(gifts)

});
