var search=document.querySelector("#searchbtn");
var list=document.querySelector("#listTrip");
search.addEventListener('click',()=>{
   
    list.style.display="block";
});
const tbody = document.querySelector('tbody');
function createElements(trips)
{
      // console.log
        // const {idTrip, dateDepart, dateArrive, departure, arrival, prix, status } = trips;
        console.log(tbody.childNodes.length );
       
         for(const trip in trips)
       { const tr = document.createElement('tr');
        tr.classList.add('bg-blue');
        tr.classList.add('mb-4');
        
        const tdDepart = document.createElement('td');
        tdDepart.classList.add('pt-3');
        tdDepart.classList.add('mt-1');
        tdDepart.innerHTML=trips[trip].dateDepart+"<br>"+trips[trip].departure;
       
        tr.append(tdDepart);
        const tdArrive = document.createElement('td');
        tdArrive.classList.add('pt3');
        tdArrive.innerHTML=trips[trip].dateArrive+"<br>"+trips[trip].arrival;
        tr.append(tdArrive);
        const price = document.createElement('td');
        price.classList.add('pt-3');
        price.innerHTML = trips[trip].prix + " DH";
        tr.append(price);
        const status = document.createElement('td');
        if(trips[trip].status == 0)
        {
            status.innerHTML="canceled";
        }
        else if(trips[trip].status == 1)
        {
            status.innerHTML="avalibale";
        }
        tr.append(status);
        const event = document.createElement('td');
        event.classList.add('pt-3');
        const link = document.createElement('a');
        link.classList.add('btn');
        link.classList.add('btn-primary');
        link.href = "http://localhost/TripReservation/Booking/bookingTrip/"+trips[trip].idTrip;
        link.innerHTML="Reserve";
        event.append(link);
        tr.append(event);

          const space = document.createElement('tr');
          space.id="spacing-row";
          const tdsp=document.createElement('td');
          space.append(tdsp);
        

        tbody.append(tr);
        tbody.append(space);

    }
}
function listTrips(trips)
{
   if (tbody.childNodes.length == 1)

     { 
       createElements(trips);
     }
  else{
        var child = tbody.firstChild;
        while(child)
        {
          tbody.removeChild(child);
          child=tbody.firstChild;
        }
        console.log(tbody.firstChild);
       createElements(trips);
    }
    // 
       
    
}