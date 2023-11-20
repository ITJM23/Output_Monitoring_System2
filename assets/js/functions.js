function formatDate(date_val){

    var formattedDate = new Date(date_val);
    var d = formattedDate.getDate();
    var m = formattedDate.getMonth();
    // m += 1;  // JavaScript months are 0-11
    var y = formattedDate.getFullYear();

    const monthNames = ["January", "February", "March", "April", "May", "June",
    "July", "August", "September", "October", "November", "December"
    ];

    if(d < 10){

        d = "0" + d
    }

    m = monthNames[m]

    return m +" "+ d + ", " +y
}