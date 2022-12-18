<script>
    const cursor=document.querySelector('.cursor');

document.addEventListner('mousemove', e=>{
    cursor.setAttribute("style", "top: " +e.pageY+ "px; left: "+e.pageX+"px")
})
    </script>