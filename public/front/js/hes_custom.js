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


    $(".ticket-counter-plus").click(function() {
        var ticketId = $(this).attr("ticket_id");
        var ticketValueElement = $(".ticket-counter-value[ticket_id='" + ticketId + "']");
        var currentValue = parseInt(ticketValueElement.text());
        var maxReg = parseInt($(this).attr("max_reg"));

        if (currentValue >= maxReg) {

            
            $(this).attr("disabled", true);
            

        }
        //ticketValueElement.text(currentValue + 1);
         // alert("Ticket ID: " + ticketId + ", Value: " + currentValue);


    });

    $(".ticket-counter-minus").click(function() {
        var ticketId = $(this).attr("ticket_id");
        var ticketValueElement = $(".ticket-counter-value[ticket_id='" + ticketId + "']");
        var currentValue = parseInt(ticketValueElement.text());
        var maxReg = parseInt($(this).attr("max_reg"));
         
        if (currentValue < maxReg) {
            
            $(".ticket-counter-plus[ticket_id='" + ticketId + "']").attr("disabled", false);

        }




    });


    // Custom JavaScript code for the footer
});