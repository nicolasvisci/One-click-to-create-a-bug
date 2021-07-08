<style>

h1 {
    color: #fff;
    text-align: center;
    position: relative;
    bottom: 50px;
}

span {
  transition: background-size .5s, background-position .3s ease-in .5s;
}
span:hover {
  transition: background-position .5s, background-size .3s ease-in .5s;
}
span {
  background-image: linear-gradient(orange, orange);
  background-repeat: no-repeat;
  background-position: 0% 100%;
  background-size: 100% 0px;
  border-radius: 10px 10px 10px 10px;
}
span:hover {
  background-size: 100% 100%;
  background-position: 0% 0%;
}

</style>

    <main>
            <form class="compile-form" action="dashboard3" method='post'>
            <div>
            
            <h1><span> CAMBIA PASSWORD </span></h1> </div>
           
                <input type required="text" name="id" placeholder="Codice">
                <input type required="text" name="password" placeholder="Nuova Password">
                <input type required="text" name="confpsw" placeholder="Conferma Nuova Password">
                <button type="submit" name="submit" class="regLog_btn" ><a class="regLog_text">Invia</a></button>

        </main>
    </body>
</html>