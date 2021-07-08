<!DOCTYPE html>
<html lang="en">
<style>
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

h1 { color: white; font-family: 'Helvetica Neue', sans-serif; 
font-size: 60px; 
font-weight: bold; 
letter-spacing: -1px;
line-height: 1;
text-align: center;
border: 0px; 
}

h2 { color: white;
font-family: 'Helvetica Neue', sans-serif; 
font-size: 40px; 
font-weight: bold; 
letter-spacing: -1px;
line-height: 1;
text-align: center; 
}

p {
    background-color: #2990c8;
    margin: 20px 45px;
    border: 0px;
    border-radius: 0px;
    padding: .5em;
    font-size: 16px;
    text-align: center;
}

</style>

<title>Guida Tamponi</title>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1">
<link rel="stylesheet" href="https://www.w3schools.com/w3css/4/w3.css">
<link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Lato">
<link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Montserrat">
<script src='https://kit.fontawesome.com/a076d05399.js' crossorigin='anonymous'></script>
<style>
body,h1,h2,h3,h4,h5,h6 {font-family: "Lato", sans-serif}
.w3-bar,h1,button {font-family: "Montserrat", sans-serif}
.fa-info,.fa-coffee {font-size:200px}
</style>
<body>

<!-- Header -->
<header class="w3-container w3-dark w3-center" style="padding:128px 16px">
  <h1><span class="w3-margin w3-jumbo Title">GUIDA TAMPONI</span></h1>
</header>

<!-- First Grid -->
<div class="w3-row-padding w3-padding-64 w3-container">
  <div class="w3-content">
    <div class="w3-twothird">
      <h1 class="w3-text-black">Test molecolare (mediante tampone naso orofaringeo)</h1>
      <h4 class="w3-padding-32 ">Il principale e più affidabile strumento diagnostico è il cosiddetto tampone molecolare naso orofaringeo che consiste in un’indagine capace di rilevare il genoma (RNA) del virus SARS-Cov -2 nel campione biologico attraverso il metodo RT-PCR.  Questo test ha un altissimo grado di sensibilità e specificità, ossia ha un’elevata capacità di identificare gli individui positivi al virus in modo che ci sia il minor numero possibile di falsi positivi  e una altrettanto elevata capacità di identificare correttamente coloro che non hanno la malattia. L’esito di questo tampone si ottiene mediamente in tre/sei ore. </h5>

      <p class="w3-text-black">Il tampone molecolare è la prima scelta, ad esempio, in caso di caso sospetto sintomatico, di contatto stretto di caso confermato che manifesta sintomi, negli screening degli operatori sanitari, nei soggetti a contatto con persone fragili o per l’ingresso in comunità chiuse o ospedali. </p>
    </div>

    <div class="w3-third w3-center">
      <i class="fa fa-viruses" style='font-size:200px;color:green'></i>
    </div>
  </div>
</div>

<!-- Second Grid -->
<div class="w3-row-padding w3-light-grey w3-padding-64 w3-container">
  <div class="w3-content">
    <div class="w3-third w3-center">
      <i class="fa fa-viruses" style='font-size:200px;color:purple'></i>
    </div>

    <div class="w3-twothird">
      <h1 class="w3-text-black">Test antigenico rapido (mediante tampone nasale, naso-oro-faringeo, salivare)</h1>
      <h4 class="w3-padding-32">Il test antigenico rapido costa meno e non ha bisogno di personale specializzato producendo più rapidamente il risultato (30-60 minuti) rispetto al test molecolare. E’ uno strumento utile soprattutto per le indagini di screening e laddove servano in poco tempo indicazioni per le azioni di controllo. A differenza dei test molecolari, però, i test antigenici rilevano la presenza del virus non tramite il suo acido nucleico (RNA) ma tramite le sue proteine (antigeni). Per questo comunemente viene anche chiamato test antigenico. L’affidabilità non è ancora paragonabile a quella dei test molecolari e la positività in alcuni contesti può richiedere la conferma del test molecolare.</h5>
    </div>
  </div>
</div>

<!-- Third Grid -->
<div class="w3-row-padding w3-padding-64 w3-container">
  <div class="w3-content">
    <div class="w3-twothird">
      <h1 class="w3-text-black">Test sierologici</h1>
      <h4 class="w3-padding-32">I test sierologici rilevano se le persone sono venute a contatto con il virus SARS-COV- 2 ma non sono in grado di confermare o meno una infezione in atto e richiedono, perciò, in caso di positività, un ulteriore test molecolare su tampone per la conferma. Al fine di ridurre il numero di risultati di falsi positivi è fortemente raccomandato l’utilizzo di test del tipo CLIA e/o ELISA che abbiano una specificità non inferiore al 95% e una sensibilità non inferiore al 90%. Al di sotto di queste soglie, l’affidabilità del risultato ottenuto non è adeguata alle finalità per cui i test vengono eseguiti. </h5>
    </div>

    <div class="w3-third w3-center">
      <i class="fa fa-viruses" style='font-size:200px;color:green'></i>
    </div>
  </div>
</div>

<!-- Fourth Grid -->
<div class="w3-row-padding w3-green w3-padding-64 w3-container">
  <div class="w3-content">
    <div class="w3-third w3-center">
      <i class="fa fa-check" style='font-size:200px;color:green'></i>
    </div>

    <div class="w3-twothird">
      <h1 class="w3-text-white">Quando fare il test molecolare</h1>
      <ul>
        <h4 class="w3-padding-32">Su richiesta della Asl: 
        <li>se si è contatti stretti di una persona a cui è stata confermata l’infezione, al decimo giorno dall’ultimo contatto</li>  
        <li>se compaiono sintomi riferibili a Covid-19, in caso di sintomatologia dopo aver consultato il medico di medicina generale o il pediatra di libera scelta</li> 
        <li>se si è una persona già risultata positiva ai test per controllare l’avvenuta guarigione</li> </h5>
      </ul>
      <p class="w3-text-black w3-green">In attesa dell’esito del test diagnostico va rispettato l'isolamento domiciliare.</p>
    </div>
  </div>
</div>
</body>
</html>

<!-- Fifth Grid -->
<div class="w3-row-padding w3-red w3-padding-64 w3-container">
  <div class="w3-content">
    <div class="w3-third w3-center">
      <i class="fa fa-times" style='font-size:200px;color:red'></i>
    </div>

    <div class="w3-twothird">
      <h1 class="w3-text-white">Quando non fare il test molecolare</h1>
        <h4 class="w3-padding-32">Non è raccomandato prescrivere test diagnostici a persone che sono state a contatto con contatti stretti di un caso confermato. Esse non devono, inoltre, essere considerate sospette né essere sottoposte ad alcuna misura di quarantena.</h5>
    </div>
  </div>
</div>
</body>
</html>
