$(document).ready(function() {


    $("#ticketPayBtn").click(function() {
        
        
        $(".ticket-counter-value").each(function() {
            var ticketId = $(this).attr("ticket_id");
            var ticketValue = $(this).text();
            $("input[name='ticket_" + ticketId + "']").val(ticketValue);

          // alert("Ticket ID: " + ticketId + ", Value: " + ticketValue);

          $("#ticketClickSubmit").click();

        });

        

    });

    // Custom JavaScript code for the footer
});