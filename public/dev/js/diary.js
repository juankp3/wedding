$(document).ready(function () {
  const eventTitle = "Boda de M. Angélica & Luis";
  const eventDescription = "Únete a nosotros para celebrar el matrimonio de M. Angélica y Luis. Acompáñanos en una ceremonia llena de amor y alegría, seguida de una recepción con banquete, música y baile. ¡Esperamos contar con tu presencia en este día tan especial!";
  const eventLocation = "Basílica María Auxiliadora, Av. Brasil 210, Breña";
  const startDate = new Date("2024-08-24T15:30:00");
  const endDate = new Date("2024-08-25T00:00:00");


  // Formatear la fecha para Google Calendar (YYYYMMDDTHHmmssZ)
  function formatDateGoogle(date) {
    return date.toISOString().replace(/-|:|\.\d+/g, '');
  }

  // Crear el enlace para Google Calendar
  function createGoogleCalendarLink() {
    const baseUrl = "https://calendar.google.com/calendar/render";
    const params = new URLSearchParams({
      action: "TEMPLATE",
      text: eventTitle,
      details: eventDescription,
      location: eventLocation,
      dates: `${formatDateGoogle(startDate)}/${formatDateGoogle(endDate)}`
    });

    return `${baseUrl}?${params.toString()}`;
  }

  // Manejar el clic en el botón de Google Calendar
  $('#googleCalendarButton').click(function () {
    console.log('google')
    window.open(createGoogleCalendarLink(), '_blank');
  });


});
