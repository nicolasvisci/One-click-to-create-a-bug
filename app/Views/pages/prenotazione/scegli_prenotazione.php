<style>
.form-group{
    margin-left:380px;
}
.control-label{
    margin-left: 0px;
}

.form-control{
    margin-left: 330px;
}

span {
  transition: background-size .5s, background-position .3s ease-in .5s;
}
span:hover {
  transition: background-position .5s, background-size .3s ease-in .5s;
}
span {
  background-image: linear-gradient(#222, #222);
  background-repeat: no-repeat;
  background-position: 0% 100%;
  background-size: 100% 0px;
  border-radius: 10px 10px 10px 10px;
}
span:hover {
  background-size: 100% 100%;
  background-position: 0% 0%;
}

#click {
    background-color: orange;
    border:1px;
    border-radius: 5px;
    cursor:pointer;
    size: 30px;
    font-size: 30px;
    margin-top: 150px;
    margin-bottom: 10px;
}

#click:hover {
  background-color: #222;
}

#element1 {
    display: inline-block;
}


</style>

<form>
<center>
<div id="element1">
<button id="click" name="click" type="submit" style="height:150px; width:400px; color:white" formaction="prenotazione_singola"> PRENOTAZIONE SINGOLA </button>
<button id="click" name="click" type="submit" style="height:150px; width:400px; color:white" formaction="prenotazione_multipla"> PRENOTAZIONE MULTIPLA </button>
</center>
</div>
</form>