<head>
    <link rel="stylesheet" type="text/css" href="{{ asset('css/pdf.css') }}">
    <link rel="stylesheet" type="text/css" href="{{ asset('css/idGeneratedStyles.css') }}">
    <title>Tweekracht | Rapport</title>
</head>
<body>
<!--Voorblad-->
@include('report.pdf.partials.logo')

<div class="kleurvlak">
    <div class="witregel"></div>
    <p class="Font70 wit">De beste<br>Route naar<br>je beste ik</p>
    <div class="witregel"></div>
    <img class="kaarten" src="{{ asset('images/rapport/alle_kaarten.png') }}">
    <div class="witregel"></div>
    <div>
        <p class="Font12 wit centertekst">
            Kernkrachten van {{ $reportPdf->client->full_name }}
            <br>
        </p>
    </div>
</div>

<div class="page-break"></div>
<!--pagina1-->
<div class="content">
    <div class="witregel"></div>
    <div class="witregel"></div>
    <p class="groottekst">
        GEFELICITEERD, <br> JE BENT BRILJANT!
    </p></div>
<div class="container3">
    <div style="z-index:9000; position: absolute; top:56px; margin-left:67.5px;">
        <div alt="left"
             style="background: {{ $reportPdf->firstCorePower->color }}; width: 30px; height: 30px; border-radius: 15px;"></div>
    </div>

    <div alt="right"
         style="background: {{ $reportPdf->secondCorePower->color }}; width: 30px; height: 30px; border-radius: 15px; z-index:9000; position: absolute; margin-top:56px; margin-left:399.5px;"></div>

    <div style="z-index:9000; position: absolute; top:1px; margin-left:233px;">
        <div alt="up-center"
             style="background: {{$reportPdf->getUpperColor()}}; width: 30px; height: 30px; border-radius: 15px;"></div>
    </div>

    <div style="z-index:9000; position: absolute; top:285px; margin-left:234.8px;">
        <div alt="down-center"
             style="background: {{$reportPdf->getBottomColor()}}; width: 30px; height: 30px; border-radius: 15px;"></div>
    </div>
    <img class="diamantrel" src="{{ asset('images/rapport/diamant2.png') }}"/>
    <div class="links">
        <p class="Font24 centertekst">
            {{ $reportPdf->firstCorePower->power }}
        </p>
    </div>
    <div class="rechts">
        <p class="Font24 centertekst">
            {{ $reportPdf->secondCorePower->power }}
        </p>
    </div>
    <div class="boven">
        <p class="FontLight centertekst">
            {{ $reportPdf->getUpperPower() }}
        </p>
    </div>
    <div class="onder">
        <p class="FontLight centertekst">
            {{ $reportPdf->getBottomPower() }}
        </p>
    </div>
</div>
<div class="uptekst"><p class="Font15 centertekst">ALS JE JOUW UNIEKE TALENTEN<br> INZET NOG MEER</p></div>
<div class="witregel"></div>

@include('report.pdf.partials.copywrite')

<div class="page-break"></div>
<!--pagina2-->
@include('report.pdf.partials.logo')

<div class="content"><br>
    <p class="Font20">Jouw 2 unieke krachten</p>
    <p class="normaaltekst"><br>Jij hebt 2 positieve KernKrachten die jou de meeste energie geven en je aantrekkelijk
        maken.<br>
        Deze laten zien welke mensen, organisaties, plekken en welke aanpak het beste bij jou passen en de meeste
        positieve energie geven. Met KernKrachten kun je je talenten onthullen, sterker in balans blijven en groeien.
    </p>
    <br>
    <p class="Font20" style="color:{{$reportPdf->firstCorePower->color}}">
        {{ $reportPdf->firstCorePower->power }}
    </p>
    <p class="normaaltekst">
        <br>
        {{ $reportPdf->firstCorePower->description }}
    </p>
    <br>

    <p class="Font20" style="color:{{$reportPdf->secondCorePower->color}}">
        {{ $reportPdf->secondCorePower->power }}
    </p>
    <p class="normaaltekst">
        <br>
        {{ $reportPdf->secondCorePower->description }}
    </p>
</div>

@include('report.pdf.partials.copywrite')
<div class="page-break"></div>
<!--pagina 3-->
@include('report.pdf.partials.logo')
<div class="kleurvlak2">
    <div class="content">
        <div class="witregel"></div>
        <p class="Font18 justify"><span style="color:white;">TWEEKRACHT ONTHULT HET DIEPSTE</span> WAAROM
            (WHY) VAN ORGANISATIES, TEAMS EN INDIVIDUEN.<br><br>
            <span style="color:white;">DIT DOCUMENT IS GESCHREVEN EN OP MAAT GEMAAKT
AAN DE HAND VAN JOUW PERSOONLIJKE
IDENTITEIT.<br><br>
JE KUNT JEZELF AFVRAGEN</span> WAAROM<span style="color:white;"> JE DINGEN
DOET,</span> WAAROM <span style="color:white;">HET JE WEL OF GEEN ENERGIE
GEEFT</span> WAAROM <span style="color:white;">HET JOU EN ANDEREN OM JE
HEEN AANTREKT. MAAR ER KOMT EEN MOMENT
DAT JE GEEN ANTWOORD MEER WEET... JE KUNT
GEEN DIEPERE LAAG MEER VINDEN </span>WAAROM...<span style="color:white;"><br><br>
DIT WAREN DE MOMENTEN DIE WE TELKENS WEER
TEGENKWAMEN TOEN WE MENSEN INTERVIEWDEN.
VOORTDUREND IN EEN PATROON VAN 2 DINGEN.
TELKENS WEER, KEER OP KEER. WE HEBBEN
ZE KERNKRACHTEN GENOEMD.<br><br>
            </span>WAAROM?<span
                style="color:white;"> OMDAT ZE IETS HEEL DIEPS, MOOIS EN KRACHTIGS IN JOU ONTHULLEN.</span></p>
    </div>
</div>
<div class="copywrite"><p class="centertekst wit copy">Copyright {{ \Carbon\Carbon::now()->year }}, alles uit deze uitgave is auteursrechtelijk
        beschermd door Mieke Boogert en TweeKracht.</p></div>
<div class="page-break"></div>
@include('report.pdf.partials.logo')
<div class="witregel"></div>
<div class="witregel"></div>
<p class="Font37" style="color: #42bfea;">WAAROM ZIJN KERNKRACHTEN NUTTIG VOOR JOU PERSOONLIJK?</p>

<div class="container2">
    <span style="margin-top:20px;"></span>
    <div class="eerstevak">
        <p class="Font14 wit centertekst">MEER ENERGIE</p><br>
        <p class="Font10 justify">Jouw unieke 2 KernKrachten geven jou de meeste energie. Naast slapen en relaxen
            natuur- lijk. Als je in je KernKracht(en) staat en in beweging bent, krijg je eerder energie dan dat het je
            energie kost. Top toch!</p></div>

    <div class="vak">
        <p class="Font14 wit centertekst">EEN BAAN</p><br>
        <p class="Font10 justify">Wat voor een werkgever en col- lega’s passen bij jou? En welke manier van werken geeft
            je de meeste energie en kracht? Op die vragen kun je meer inzichten vinden met hulp van jouw 2 persoonlijke
            KernKrachten.</p></div>

    <div class="vak">
        <p class="Font14 wit centertekst">BETERE KEUZES</p><br>
        <p class="Font10 justify">We kunnen natuurlijk nooit een keuze voor jou maken. Wel kunnen we jou tools geven om
            jouw keuzes te versterken. Keu- zes die je gelukkig en sterk ma- ken. Die hulp en inzichten geven we
            a.d.h.v. jouw 2 KernKrachten.</p></div>
    <br>
    <div class="vak">
        <p class="Font14 wit centertekst">MATCHING</p><br>
        <p class="Font10 justify">Wie of wat past bij jou? Waar krijg je de meeste goede vibes van? Daar zitten ook jouw
            matches in verborgen. Want natuurlijk zoek je liever datgene op waar je fijne energie van krijgt.
            KernKrachten helpen daarbij.</p></div>

    <div class="vak">
        <p class="Font14 wit centertekst">POSITIVITEIT</p><br>
        <p class="Font10 justify">Wij geloven in mooie eigen- schappen en talenten. In mat- ches of mis-matches in
            plaats van afwijzing. Je kunt altijd zelf kiezen hoe je naar dingen kijkt. Positiviteit brengt je daarin
            verder. Deze versterken we graag!</p></div>

    <div class="vak">
        <p class="Font14 wit centertekst">ZELFBEWUSTZIJN</p><br>
        <p class="Font10 justify">Fijn als je jezelf in 2 woorden kan omschrijven {{ $client->first_name}}.
            Twee KernKrachten die je voorkeuren, talenten en handelen onthullen, dat wat jou mooi en aantrekke- lijk
            maakt. Dit zelf-begrip geeft je meer innerlijke rust en zelfinzicht.</p></div>
</div>
@include('report.pdf.partials.copywrite')
<div class="page-break"></div>
<!--pagina 2-->
@include('report.pdf.partials.logo')
<div class="content">
    <p class="Font20">Jouw hulpkrachten</p>
    <p class="normaaltekst"><br><span style="font-weight:700;">{{ $client->first_name }}, jouw persoonlijke HulpKrachten zijn <b
                style="color: #42bfea;">{{ $reportPdf->firstSupportPower->power }}</b> en <b
                style="color: #42bfea;">{{ $reportPdf->secondSupportPower->power }}</b>.</span><br><br>
        Hulpkrachten zijn krachten die je in balans brengen. In dit geval laten ze jouw KernKrachten:
        <b>{{ $reportPdf->firstCorePower->power }}</b> en
        <b>{{ $reportPdf->secondCorePower->power }}</b> beter/positiever samenwerken. Ze zijn niet het
        allersterkst in jou
        aanwezig (zoals
        <b>{{ $reportPdf->firstCorePower->power }}</b> en
        <b>{{ $reportPdf->secondCorePower->power }}</b> maar zijn waarschijnlijk wel heel belangrijk voor
        je. Het is iets dat je vermoedelijk oprecht ook kunt waarderen en mooi vindt in andere mensen,
        denk er maar eens over na.<br>
        Als jij je persoonlijke hulpkrachten inzet voor jezelf, dan zul je merken dat jij je gebalanceerder,
        energieker en rustiger gaat voelen. Het stimuleert jouw KernKrachten om beter en prettiger
        samen te werken. Je kunt dit in jezelf stimuleren door in je eigen houding en gedrag meer
        <b>{{ $reportPdf->firstSupportPower->power }}</b> en
        <b>{{ $reportPdf->secondSupportPower->power }}</b>
        te zijn, maar wat ook goed voor je werkt is om andere mensen vaker op te zoeken die van nature meer
        <b>{{ $reportPdf->firstSupportPower->power }}</b> en
        <b>{{ $reportPdf->secondSupportPower->power }}</b>
        zijn. Als een externe stimulans voor jezelf om sterker hierin te worden. Hieronder staat meer tekst en uitleg
        over jouw persoonlijke
        Hulpkrachten.</p>
    <br>
    <p class="Font20"
       style="color:{{ $reportPdf->firstSupportPower->color }}">{{ $reportPdf->firstSupportPower->power }}</p>
    <p class="normaaltekst"><br>{{ $reportPdf->firstSupportPower->description }}
        <b>{{ $reportPdf->getFirstEndText() }}</b></p><br>
    <p class="Font20"
       style="color:{{ $reportPdf->secondSupportPower->color }}">{{ $reportPdf->secondSupportPower->power }}</p>
    <p class="normaaltekst"><br>{{ $reportPdf->secondSupportPower->description }}
        <b>{{ $reportPdf->getLastEndText() }}</b></p>
</div>

@include('report.pdf.partials.copywrite')
<div class="page-break"></div>

@include('report.pdf.partials.logo')
<div class="content">
    <p class="Font14">VOORBEELD HERHAALOPDRACHT VOOR PERSOONLIJKE GROEI</p>
    <br>
    <p class="normaaltekst">Stel dat je jezelf een cijfer mag geven voor in hoeverre jij je krachten inzet, een cijfer
        tussen de 0 en 6. Waarbij 0 te weinig is, 6 te veel en 5 perfect. Welk cijfer geef je dan aan je krachten?
        <br><br>In hoeverre zet je deze voor je omgeving in? Geef hieronder aan wat voor jou van toepassing is in het
        voorbeeld.</p><br>

    @include('report.pdf.partials.table')

    <br>
    <p class="normaaltekst">In hoeverre zet je deze voor jezelf in {{$client->first_name }}?</p><br>
    @include('report.pdf.partials.table')
    <br>
    <p class="normaaltekst">
        Kies met regelmaat een Kracht uit die wat jou betreft de meeste aandacht verdient. Bijvoorbeeld omdat je deze
        mag loslaten of omdat je deze meer mag inzetten.<br><br>
        Probeer het een paar dagen en kijk dan weer terug naar je cijferlijst. Start bij voorkeur met in hoeverre je het
        in je omgeving inzet. Maar mocht je liever beginnen met in hoeverre je het voor jezelf inzet, dan houden we je
        natuurlijk niet tegen. :)<br><br>
        Blijf je resultaat meten, a.d.h.v. je eigen perceptie. Hoe jij het ziet.
        Ben je er op vooruit gegaan? Mooi! Dan kun je jezelf weer een nieuwe challenge geven. Dus weer 1 Kracht
        kiezen en deze bewust een tijdje meer of minder in te zetten. Je zult je dan al snel beter gaan voelen en merken
        dat dingen in je leven ‘soepeler’ lopen. Het geeft je als het goed is meer energie. Ons doel is dat je alle
        krachten
        straks een cijfer 5 kunt geven. Of in ieder geval dit blijft nastreven.
    </p><br><br>
</div>
@include('report.pdf.partials.copywrite')
<div class="page-break"></div>

@include('report.pdf.partials.logo')
<div class="content">
    <p class="Font14">GOED OM TE WETEN</p>
    <br>
    <p class="normaaltekst">Misschien valt het je wel op als je de oefening doet, maar we komen regelmatig een patroon
        tegen als mensen een cijfer geven aan in ‘hoeverre’ ze hun Krachten wel of niet inzetten. Dat patroon is dat als
        je een kracht minder inzet, dit over het algemeen niet ontstaan is vanuit het innerlijk maar vanuit factoren om
        je heen, je
        omgeving.<br><br>
        <b>Het minder inzetten van krachten</b> die in je zitten is ontstaan uit (meestal minder leuke) ervaringen die
        je hebt opgedaan in het verleden of (nog steeds opdoet) in je omgeving. We vragen je niet perse om te focussen
        op deze dingen, maar vooral om het lekker los te laten en dichter bij jezelf te komen. Op te laden en te
        genieten van wie je bent en wat je te brengen hebt aan je omgeving/ de mensen om je heen die ook houden van de
        Krachten die jou het meeste energie geven. Want die mensen zijn er absoluut!<br><br>
        <b>Hoe meer jij vanuit je eigen krachten handelt en doet, hoe meer je deze mensen en plaatsen ook zult
            aantrekken en vinden. Zo zet je in jezelf een positief effect aan die je aan de hand van deze oefening
            telkens weer opnieuw kunt (en mag) aanzwengelen.</b><br><br>

    <div class="InvulContainer">
        <div class="invulBreed" style="margin-bottom:2px;"></div>
        <div class="invulBreed" style="margin-bottom:2px;"></div>
        <div class="invulBreed" style="margin-bottom:2px;"></div>
        <div class="invulBreed" style="margin-bottom:2px;"></div>
        <div class="invulBreed" style="margin-bottom:2px;"></div>
        <div class="invulBreed" style="margin-bottom:2px;"></div>
        <div class="invulBreed" style="margin-bottom:2px;"></div>
    </div>
    <img class="denkvrouw" src="{{ asset('images/rapport/denkvrouw.png') }}"/>
</div>

@include('report.pdf.partials.copywrite')
<div class=" page-break">
</div>
@include('report.pdf.partials.logo')
<div class="content">
    <p class="Font14">REFLECTEREN MET ANDEREN</p>
    <br>
    <p class="normaaltekst">Het is goed om zelf na te denken hoe jij je balans ziet, maar het is minstens zo leerzaam om
        anderen te vragen hoe zij ernaar kijken. Zo heb je nog meer inzichten om op te bouwen en groeien. Het is leuk om
        dit samen te doen en er meteen over te praten, voorbeelden te vragen om te kijken waar concrete talenten en
        verbeter-punten zitten. Als collega’s of vrienden een cijfer mogen geven voor in hoeverre jij je krachten inzet,
        een cijfer tussen de 0 en 6. Waarbij 0 te weinig is, 6 te veel en 5 perfect. Welk cijfer geven zij dan aan je
        krachten?<br><br>
        Naam:</p>
    <div style="background-color:grey;" class="enkelInvul"></div>
    <p class="normaaltekst">In hoeverre vind jij dat {{$client->first_name}} deze kernkrachten inzet?</p>
    <br>
    @include('report.pdf.partials.table')
    <br>
    <p class="normaaltekst">Naam:</p>
    <div style="background-color:grey;" class="enkelInvul"></div>
    <p class="normaaltekst">In hoeverre vind jij dat {{$client->first_name}} deze kernkrachten inzet?</p>
    <br>
    @include('report.pdf.partials.table')
    <br>
    <p class="normaaltekst">Door hier over te praten leer je elkaar meteen beter kennen en weten anderen waar je
        talenten zitten.
        Dat is hartstikke leuk! <br><br>TweeKracht werkt voor individuen maar ook voor teams, organisaties en hun
        klanten. KernKrachten kunnen worden ingezet voor Persoonlijk Empowerment, Branding, HR. Toegepaste psychologie,
        Coaching, Matching, Communicatie- en Innovatie-trajecten.
    </p><br>
    <p class="Font14">Heb jij nog vragen of opmerkingen {{$client->first_name}}?</p>
    <p class="normaaltekst">Neem contact op met je coach.</p>

</div>
@include('report.pdf.partials.copywrite')
<div class="page-break"></div>

@include('report.pdf.partials.logo')
<div class="content">
    <p class="Font14">HERHAALOPDRACHT VOOR PERSOONLIJKE GROEI - <a style="color:#55c3e9;">start</a></p><br>
    <p class="normaaltekst">Stel dat je jezelf een cijfer mag geven voor in hoeverre jij je krachten inzet, een cijfer
        tussen de 0 en 6. Waarbij 0 te weinig is, 6 te veel en 5 perfect. Welk cijfer geef je dan aan je krachten?
        <br><br>In hoeverre zet je deze voor je <b style="color:#55c3e9;">omgeving</b> in? Vink aan wat voor jou van
        toepassing is hieronder:</p>
    <br>
    @include('report.pdf.partials.table')
    <br>
    <p class="normaaltekst">In hoeverre zet je deze voor <b style="color:#55c3e9;">jezelf</b> in? Vink aan wat voor jou
        van toepassing is hieronder:</p>
    <br>
    @include('report.pdf.partials.table')
    <br>
    <p class="normaaltekst">Kies nu 1 Kracht uit die wat jou betreft de meeste aandacht verdient. Bijvoorbeeld omdat je
        deze mag loslaten
        of omdat je deze meer mag inzetten. <br><br>
        <b style="color:#55c3e9;">Kies er dus 1 uit en focus je daar de komende week op, schrijf deze Kracht hieronder
            op in het invulveld:</b></p>
    <br>
    <div class="enkelInvul"></div>
    <br>
    <br>
    <p class="normaaltekst" style="margin-bottom:5px;">Ga je deze Kracht meer voor jezelf inzetten of voor je omgeving,
        of beide? Kruis aan welke je nu kiest.</p>
    @include('report.pdf.partials.selectie')
    <p class="normaaltekst">Probeer het een paar dagen en kijk dan weer terug naar je cijferlijst. Start bij voorkeur
        met in hoeverre je het
        in je omgeving inzet. Maar mocht je liever beginnen met in hoeverre je het voor jezelf inzet, dan houden we je
        natuurlijk niet tegen. :) <br><br>
        <b>Blijf je resultaat meten, a.d.h.v. je eigen perceptie. Hoe jij het ziet.</b><br>
        Ben je er op vooruit gegaan? Mooi! Dan kun je jezelf weer een nieuwe challenge geven. Dus weer 1 Kracht
        kiezen en deze bewust een tijdje meer of minder in te zetten. Je zult je dan al snel beter gaan voelen en merken
        dat dingen in je leven ‘soepeler’ lopen. Het geeft je als het goed is meer energie. Ons doel is dat je alle
        krachten
        straks een cijfer 5 kunt geven. Of in ieder geval dit blijft nastreven.</p></div>
@include('report.pdf.partials.copywrite')
<div class="page-break"></div>
@include('report.pdf.partials.logo')
<div class="content">
    <p class="Font14">WELKE MENSEN KEN JIJ, DIE - <a style="color:#55c3e9;">vul in</a></p><br>
    <p class="normaaltekst">Mensen die het gedrag van jouw krachten of KernKrachten vertonen geven je als het goed is
        extra
        positieve energie en balans. Het is dus goed eens te kijken wie dat zijn. Micht je 1 van je krachten willen
        versterken, dan is het ook zinvol deze mensen meer te zien/met ze af te spreken, het helpt je sneller in
        balans. Dus wie ken jij die volgens jou het volgende gedrag veel of regelmatig vertoont? Wie is er volgens
        jou... <br><br>
        Vul hieronder de namen in van mensen die dit volgens jou hebben/ vaak vertonen of zijn:</p><br>

    <br>
    <p class="Font18"
       style="color:{{$reportPdf->firstCorePower->color}}">{{$reportPdf->firstCorePower->power}}</p>
    <br>
    <div class="InvulContainer">
        <div class="enkelInvul"></div>
        <div class="enkelInvul"></div>
        <div class="enkelInvul"></div>
        <div class="enkelInvul"></div>
        <div class="enkelInvul"></div>
        <div class="enkelInvul"></div>
    </div>
    <br><br>
    <p class="Font18"
       style="color:{{$reportPdf->secondCorePower->color}}">{{$reportPdf->secondCorePower->power}}</p>
    <br>
    <div class="InvulContainer">
        <div class="enkelInvul"></div>
        <div class="enkelInvul"></div>
        <div class="enkelInvul"></div>
        <div class="enkelInvul"></div>
        <div class="enkelInvul"></div>
        <div class="enkelInvul"></div>
    </div>
    <br><br>
    <p class="Font18"
       style="color:{{ $reportPdf->firstSupportPower->color }}">{{ $reportPdf->firstSupportPower->power }}</p>
    <br>
    <div class="InvulContainer">
        <div class="enkelInvul"></div>
        <div class="enkelInvul"></div>
        <div class="enkelInvul"></div>
        <div class="enkelInvul"></div>
        <div class="enkelInvul"></div>
        <div class="enkelInvul"></div>
    </div>
    <br><br>
    <p class="Font18"
       style="color:{{ $reportPdf->secondSupportPower->color }}">{{ $reportPdf->secondSupportPower->power }}</p>
    <br>
    <div class="InvulContainer">
        <div class="enkelInvul"></div>
        <div class="enkelInvul"></div>
        <div class="enkelInvul"></div>
        <div class="enkelInvul"></div>
        <div class="enkelInvul"></div>
        <div class="enkelInvul"></div>
    </div>

</div>
@include('report.pdf.partials.copywrite')

<div class="page-break"></div>

@include('report.pdf.partials.logo')
<div class="content">
    <p class="Font14">WELKE PLEKKEN KEN JIJ, DIE - <a style="color:#55c3e9;">vul in</a></p><br>
    <p class="normaaltekst">Plekken die die passen bij jouw krachten of KernKrachten. Als het goed is geven deze je
        extra positieve
        energie en balans. Het is dus goed om eens te kijken weke plekken dat zijn. Dit kan werkelijk van alles
        zijn. Denk aan bepaalde landen of steden. Plekken in de natuur. Maar ook plekken in de buurt, zoals
        favoriete kroeg of museum. Plekken waar je geweest bent of waar je nog naartoe wilt gaan. Mocht je 1
        van je krachten willen versterken, dan is het zinvol deze plekken vaker op te zoeken, het helpt je sneller
        in balans. Vul hieronder de plekken in die dit volgens jou hebben of zijn, alles mag en kan!</p><br>

    <br>
    <p class="Font18"
       style="color:{{$reportPdf->firstCorePower->color}}">{{$reportPdf->firstCorePower->power}}</p>
    <br>
    <div class="InvulContainer">
        <div class="enkelInvul"></div>
        <div class="enkelInvul"></div>
        <div class="enkelInvul"></div>
        <div class="enkelInvul"></div>
        <div class="enkelInvul"></div>
        <div class="enkelInvul"></div>
    </div>
    <br><br>
    <p class="Font18"
       style="color:{{$reportPdf->secondCorePower->color}}">{{$reportPdf->secondCorePower->power}}</p>
    <br>
    <div class="InvulContainer">
        <div class="enkelInvul"></div>
        <div class="enkelInvul"></div>
        <div class="enkelInvul"></div>
        <div class="enkelInvul"></div>
        <div class="enkelInvul"></div>
        <div class="enkelInvul"></div>
    </div>
    <br><br>
    <p class="Font18"
       style="color:{{ $reportPdf->firstSupportPower->color }}">{{ $reportPdf->firstSupportPower->power }}</p>
    <br>
    <div class="InvulContainer">
        <div class="enkelInvul"></div>
        <div class="enkelInvul"></div>
        <div class="enkelInvul"></div>
        <div class="enkelInvul"></div>
        <div class="enkelInvul"></div>
        <div class="enkelInvul"></div>
    </div>
    <br><br>
    <p class="Font18"
       style="color:{{ $reportPdf->secondSupportPower->color }}">{{ $reportPdf->secondSupportPower->power }}</p>
    <br>
    <div class="InvulContainer">
        <div class="enkelInvul"></div>
        <div class="enkelInvul"></div>
        <div class="enkelInvul"></div>
        <div class="enkelInvul"></div>
        <div class="enkelInvul"></div>
        <div class="enkelInvul"></div>
    </div>

</div>
@include('report.pdf.partials.copywrite')

<div class="page-break"></div>

@include('report.pdf.partials.logo')
<div class="content">
    <p class="Font14">WELKE BOEKEN, FILMS OF MUZIEK KEN JIJ, DIE - <a style="color:#55c3e9;">vul in</a></p><br>
    <p class="normaaltekst">Boeken, films of muziek die passen bij jouw krachten of KernKrachten geven je als het goed
        is ook extra
        positieve energie en balans. Het is dus goed eens te kijken welke dat zijn. Mocht je 1 van je krachten
        willen versterken, dan is het ook zinvol dit soort boeken, films of muziek vaker te lezen, te bekijken of te
        beluisteren, het helpt je sneller in balans. Dus welke boeken, films of muziek is er volgens jou...<br>
        Ps: Wil je extra inspiratie? Vraag dan mensen in de omgeving waar zij aan moeten denken als ze jouw
        KernKrachten lezen. Wie weet wat je nog allemaal ontdekt en vindt! Vul hieronder titels van boeken of
        films of muziek in die volgens jou passen bij jouw krachten:</p><br>

    <br>
    <p class="Font18"
       style="color:{{$reportPdf->firstCorePower->color}}">{{$reportPdf->firstCorePower->power}}</p>
    <br>
    <div class="InvulContainer">
        <div class="enkelInvul"></div>
        <div class="enkelInvul"></div>
        <div class="enkelInvul"></div>
        <div class="enkelInvul"></div>
        <div class="enkelInvul"></div>
        <div class="enkelInvul"></div>
    </div>
    <br><br>
    <p class="Font18"
       style="color:{{$reportPdf->secondCorePower->color}}">{{$reportPdf->secondCorePower->power}}</p>
    <br>
    <div class="InvulContainer">
        <div class="enkelInvul"></div>
        <div class="enkelInvul"></div>
        <div class="enkelInvul"></div>
        <div class="enkelInvul"></div>
        <div class="enkelInvul"></div>
        <div class="enkelInvul"></div>
    </div>
    <br><br>
    <p class="Font18"
       style="color:{{ $reportPdf->firstSupportPower->color }}">{{ $reportPdf->firstSupportPower->power }}</p>
    <br>
    <div class="InvulContainer">
        <div class="enkelInvul"></div>
        <div class="enkelInvul"></div>
        <div class="enkelInvul"></div>
        <div class="enkelInvul"></div>
        <div class="enkelInvul"></div>
        <div class="enkelInvul"></div>
    </div>
    <br><br>
    <p class="Font18"
       style="color:{{ $reportPdf->secondSupportPower->color }}">{{ $reportPdf->secondSupportPower->power }}</p>
    <br>
    <div class="InvulContainer">
        <div class="enkelInvul"></div>
        <div class="enkelInvul"></div>
        <div class="enkelInvul"></div>
        <div class="enkelInvul"></div>
        <div class="enkelInvul"></div>
        <div class="enkelInvul"></div>
    </div>

</div>
@include('report.pdf.partials.copywrite')

<div class="page-break"></div>

@include('report.pdf.partials.logo')
<div class="content">
    <p class="Font14">WELKE ACTIVITEITEN KEN JIJ, DIE - <a style="color:#55c3e9;">vul in</a></p><br>
    <p class="normaaltekst">Activiteiten die passen bij jouw krachten of KernKrachten geven je als het goed is extra
        positieve energie
        en balans. Het is dus goed eens te kijken welke dat zijn. Denk aan hobbies, sporten, uitjes, enzovoorts.
        Mocht je 1 van je krachten willen versterken, dan is het ook zinvol deze activiteiten vaker te
        doen, het helpt je sneller in balans. Dus welke activiteiten versterken volgens jou...<br><br>
        Vul hieronder de namen in van activiteiten die dit volgens jou hebben of zijn:</p><br>

    <br>
    <p class="Font18"
       style="color:{{$reportPdf->firstCorePower->color}}">{{$reportPdf->firstCorePower->power}}</p>
    <br>
    <div class="InvulContainer">
        <div class="enkelInvul"></div>
        <div class="enkelInvul"></div>
        <div class="enkelInvul"></div>
        <div class="enkelInvul"></div>
        <div class="enkelInvul"></div>
        <div class="enkelInvul"></div>
    </div>
    <br><br>
    <p class="Font18"
       style="color:{{$reportPdf->secondCorePower->color}}">{{$reportPdf->secondCorePower->power}}</p>
    <br>
    <div class="InvulContainer">
        <div class="enkelInvul"></div>
        <div class="enkelInvul"></div>
        <div class="enkelInvul"></div>
        <div class="enkelInvul"></div>
        <div class="enkelInvul"></div>
        <div class="enkelInvul"></div>
    </div>
    <br><br>
    <p class="Font18"
       style="color:{{ $reportPdf->firstSupportPower->color }}">{{ $reportPdf->firstSupportPower->power }}</p>
    <br>
    <div class="InvulContainer">
        <div class="enkelInvul"></div>
        <div class="enkelInvul"></div>
        <div class="enkelInvul"></div>
        <div class="enkelInvul"></div>
        <div class="enkelInvul"></div>
        <div class="enkelInvul"></div>
    </div>
    <br><br>
    <p class="Font18"
       style="color:{{ $reportPdf->secondSupportPower->color }}">{{ $reportPdf->secondSupportPower->power }}</p>
    <br>
    <div class="InvulContainer">
        <div class="enkelInvul"></div>
        <div class="enkelInvul"></div>
        <div class="enkelInvul"></div>
        <div class="enkelInvul"></div>
        <div class="enkelInvul"></div>
        <div class="enkelInvul"></div>
    </div>

</div>
@include('report.pdf.partials.copywrite')

<div class="page-break"></div>

@include('report.pdf.partials.logo')
<div class="content">
    <p class="Font14">WELKE STIJL PAST BIJ JOU, DIE - <a style="color:#55c3e9;">vul in</a></p><br>
    <p class="normaaltekst">Uit jouw stijl! Stijl die past bij jouw krachten of KernKrachten geeft je als het goed is
        extra positieve
        energie en balans. Het is dus goed eens te kijken waar dat allemaal in terugkomt. Denk aan kleding,
        straalt die wel uit hoe jij je het liefste voelt? En je interieur van je woning bijvoorbeeld. Of kunst die je
        aan
        de muur hangt. De auto of fiets waar je je op voortbeweegt. Mocht je 1 van je krachten willen versterken,
        dan is het ook zinvol jouw stijl meer te gaan uitstralen, het helpt je sneller in balans. Vul hieronder in wat
        jouw stijl is in kleding, interieur, etc.:</p><br>

    <br>
    <p class="Font18"
       style="color:{{$reportPdf->firstCorePower->color}}">{{$reportPdf->firstCorePower->power}}</p>
    <br>
    <div class="InvulContainer">
        <div class="enkelInvul"></div>
        <div class="enkelInvul"></div>
        <div class="enkelInvul"></div>
        <div class="enkelInvul"></div>
        <div class="enkelInvul"></div>
        <div class="enkelInvul"></div>
    </div>
    <br><br>
    <p class="Font18"
       style="color:{{$reportPdf->secondCorePower->color}}">{{$reportPdf->secondCorePower->power}}</p>
    <br>
    <div class="InvulContainer">
        <div class="enkelInvul"></div>
        <div class="enkelInvul"></div>
        <div class="enkelInvul"></div>
        <div class="enkelInvul"></div>
        <div class="enkelInvul"></div>
        <div class="enkelInvul"></div>
    </div>
    <br><br>
    <p class="Font18"
       style="color:{{ $reportPdf->firstSupportPower->color }}">{{ $reportPdf->firstSupportPower->power }}</p>
    <br>
    <div class="InvulContainer">
        <div class="enkelInvul"></div>
        <div class="enkelInvul"></div>
        <div class="enkelInvul"></div>
        <div class="enkelInvul"></div>
        <div class="enkelInvul"></div>
        <div class="enkelInvul"></div>
    </div>
    <br><br>
    <p class="Font18"
       style="color:{{ $reportPdf->secondSupportPower->color }}">{{ $reportPdf->secondSupportPower->power }}</p>
    <br>
    <div class="InvulContainer">
        <div class="enkelInvul"></div>
        <div class="enkelInvul"></div>
        <div class="enkelInvul"></div>
        <div class="enkelInvul"></div>
        <div class="enkelInvul"></div>
        <div class="enkelInvul"></div>
    </div>

</div>
@include('report.pdf.partials.copywrite')

<div class="page-break"></div>

@include('report.pdf.partials.logo')
<div class="content">
    <p class="Font14">HERHAALOPDRACHT VOOR PERSOONLIJKE GROEI - <a style="color:#55c3e9;">week 1</a></p><br>
    <p class="normaaltekst">Stel dat je jezelf een cijfer mag geven voor in hoeverre jij je krachten inzet, een cijfer
        tussen de 0 en 6. Waarbij 0 te weinig is, 6 te veel en 5 perfect. Welk cijfer geef je dan aan je krachten?
        <br><br>In hoeverre zet je deze voor je <b style="color:#55c3e9;">omgeving</b> in? Vink aan wat voor jou van
        toepassing is hieronder:</p>
    <br>
    @include('report.pdf.partials.table')
    <br>
    <p class="normaaltekst">In hoeverre zet je deze voor <b style="color:#55c3e9;">jezelf</b> in? Vink aan wat voor jou
        van toepassing is hieronder:</p>
    <br>
    @include('report.pdf.partials.table')
    <br>
    <p class="normaaltekst">Kies nu 1 Kracht uit die wat jou betreft de meeste aandacht verdient. Bijvoorbeeld omdat je
        deze mag loslaten
        of omdat je deze meer mag inzetten. <br><br>
        <b style="color:#55c3e9;">Kies er dus 1 uit en focus je daar de komende week op, schrijf deze Kracht hieronder
            op in het invulveld:</b></p>
    <br>
    <div class="enkelInvul"></div>
    <br>
    <br>
    <p class="normaaltekst" style="margin-bottom:5px;">Ga je deze Kracht meer voor jezelf inzetten of voor je omgeving,
        of beide? Kruis aan welke je nu kiest.</p>
    @include('report.pdf.partials.selectie')
    <p class="normaaltekst">Wil je een kracht meer inzetten? Zoek dan mensen op die die kracht hebben of uitstralen,
        zoals de mensen die
        je in de eerdere opdracht hebt opgeschreven.<br><br>
        <b>Heb je al een idee hoe je die kracht komende week gaat versterken of loslaten? Schrijf het hieronder op:</b>
    </p><br>

    <div class="grootInvul"></div>


</div>
@include('report.pdf.partials.copywrite')
<div class="page-break"></div>

@include('report.pdf.partials.logo')
<div class="content">
    <p class="Font14">HERHAALOPDRACHT VOOR PERSOONLIJKE GROEI - <a style="color:#55c3e9;">week 2</a></p><br>
    <p class="normaaltekst">Stel dat je jezelf een cijfer mag geven voor in hoeverre jij je krachten inzet, een cijfer
        tussen de 0 en 6. Waarbij 0 te weinig is, 6 te veel en 5 perfect. Welk cijfer geef je dan aan je krachten?
        <br><br>In hoeverre zet je deze voor je <b style="color:#55c3e9;">omgeving</b> in? Vink aan wat voor jou van
        toepassing is hieronder:</p>
    <br>
    @include('report.pdf.partials.table')
    <br>
    <p class="normaaltekst">In hoeverre zet je deze voor <b style="color:#55c3e9;">jezelf</b> in? Vink aan wat voor jou
        van toepassing is hieronder:</p>
    <br>
    @include('report.pdf.partials.table')
    <br>
    <p class="normaaltekst">Kies nu 1 Kracht uit die wat jou betreft de meeste aandacht verdient. Bijvoorbeeld omdat je
        deze mag loslaten
        of omdat je deze meer mag inzetten. <br><br>
        <b style="color:#55c3e9;">Kies er dus 1 uit en focus je daar de komende week op, schrijf deze Kracht hieronder
            op in het invulveld:</b></p>
    <br>
    <div class="enkelInvul"></div>
    <br>
    <br>
    <p class="normaaltekst" style="margin-bottom:5px;">Ga je deze Kracht meer voor jezelf inzetten of voor je omgeving,
        of beide? Kruis aan welke je nu kiest.</p>
    @include('report.pdf.partials.selectie')
    <p class="normaaltekst">Wil je een kracht meer inzetten? Zoek dan mensen op die die kracht hebben of uitstralen,
        zoals de mensen die
        je in de eerdere opdracht hebt opgeschreven.<br><br>
        <b>Heb je al een idee hoe je die kracht komende week gaat versterken of loslaten? Schrijf het hieronder op:</b>
    </p><br>
    <div class="grootInvul"></div>
</div>
@include('report.pdf.partials.copywrite')
<div class="page-break"></div>

@include('report.pdf.partials.logo')
<div class="content">
    <p class="Font14">en, {{ $client->first_name}}?</p><br>
    <p class="normaaltekst">Hoe staat het nu met je energiepeil?<br><br>Krijg je nog steeds zo veel energie van</p><br>
    <p class="Font27"><a
            style="color:{{$reportPdf->firstCorePower->color}}">{{ $reportPdf->firstCorePower->power }}</a>
        <br>& <a
            style="color:{{$reportPdf->secondCorePower->color}}">{{ $reportPdf->secondCorePower->power }}</a>
        ?</p><br>
    <p class="Font14"><a style="color: green;">ZO jA.</a> Helemaal goed! ga zo door.</p><br>
    <p class="Font14"><a style="color: red;">ZO NEE.</a> Geen probleem!</p>
    <p class="regelafstandtekst">Dan is het goed om te kijken of je KernKrachten wel kloppen door nog eens een test af
        te leggen.
        Het kan zijn dat je uitslag tot nu toe niet helemaal klopte. Dat gebeurt wel eens en is helemaal niet
        erg. Het kan dan zijn dat je met het vinden van je KernKrachten (onbewust) teveel rekening hebt
        gehouden met de wensen van anderen of in een omgeving werkt of leeft waar je een aantal
        KernKrachten nog niet helemaal hebt kunnen toepassen. <br><br>
        Het voordeel is dat je nu nog dichter bij jezelf komt omdat je weet wat het niet is. <br>
        Een idee kan zijn om eens opnieuw de test/het spel te doen en andere kleuren te <br>
        kiezen dan die je nu gekozen hebt. Soms zorgt dat voor opzienbarende inzichten.</p>

</div>
<img class="roltrappen" src="{{ asset('images/rapport/roltrappen.jpg') }}"/>
@include('report.pdf.partials.copywrite-wit')
<div class="page-break"></div>

@include('report.pdf.partials.logo')
<div class="content">
    <p class="Font14">HERHAALOPDRACHT VOOR PERSOONLIJKE GROEI - <a style="color:#55c3e9;">week 3</a></p><br>
    <p class="normaaltekst">Stel dat je jezelf een cijfer mag geven voor in hoeverre jij je krachten inzet, een cijfer
        tussen de 0 en 6. Waarbij 0 te weinig is, 6 te veel en 5 perfect. Welk cijfer geef je dan aan je krachten?
        <br><br>In hoeverre zet je deze voor je <b style="color:#55c3e9;">omgeving</b> in? Vink aan wat voor jou van
        toepassing is hieronder:</p>
    <br>
    @include('report.pdf.partials.table')
    <br>
    <p class="normaaltekst">In hoeverre zet je deze voor <b style="color:#55c3e9;">jezelf</b> in? Vink aan wat voor jou
        van toepassing is hieronder:</p>
    <br>
    @include('report.pdf.partials.table')
    <br>
    <p class="normaaltekst">Kies nu 1 Kracht uit die wat jou betreft de meeste aandacht verdient. Bijvoorbeeld omdat je
        deze mag loslaten
        of omdat je deze meer mag inzetten. <br><br>
        <b style="color:#55c3e9;">Kies er dus 1 uit en focus je daar de komende week op, schrijf deze Kracht hieronder
            op in het invulveld:</b></p>
    <br>
    <div class="enkelInvul"></div>
    <br>
    <br>
    <p class="normaaltekst" style="margin-bottom:5px;">Ga je deze Kracht meer voor jezelf inzetten of voor je omgeving,
        of beide? Kruis aan welke je nu kiest.</p>
    @include('report.pdf.partials.selectie')
    <p class="normaaltekst">Wil je een kracht meer inzetten? Zoek dan mensen op die die kracht hebben of uitstralen,
        zoals de mensen die
        je in de eerdere opdracht hebt opgeschreven.<br><br>
        <b>Heb je al een idee hoe je die kracht komende week gaat versterken of loslaten? Schrijf het hieronder op:</b>
    </p><br>
    <div class="grootInvul"></div>
</div>
@include('report.pdf.partials.copywrite')
<div class="page-break"></div>

@include('report.pdf.partials.logo')
<div class="content">
    <p class="Font14">HERHAALOPDRACHT VOOR PERSOONLIJKE GROEI - <a style="color:#55c3e9;">week 4</a></p><br>
    <p class="normaaltekst">Stel dat je jezelf een cijfer mag geven voor in hoeverre jij je krachten inzet, een cijfer
        tussen de 0 en 6. Waarbij 0 te weinig is, 6 te veel en 5 perfect. Welk cijfer geef je dan aan je krachten?
        <br><br>In hoeverre zet je deze voor je <b style="color:#55c3e9;">omgeving</b> in? Vink aan wat voor jou van
        toepassing is hieronder:</p>
    <br>
    @include('report.pdf.partials.table')
    <br>
    <p class="normaaltekst">In hoeverre zet je deze voor <b style="color:#55c3e9;">jezelf</b> in? Vink aan wat voor jou
        van toepassing is hieronder:</p>
    <br>
    @include('report.pdf.partials.table')
    <br>
    <p class="normaaltekst">Kies nu 1 Kracht uit die wat jou betreft de meeste aandacht verdient. Bijvoorbeeld omdat je
        deze mag loslaten
        of omdat je deze meer mag inzetten. <br><br>
        <b style="color:#55c3e9;">Kies er dus 1 uit en focus je daar de komende week op, schrijf deze Kracht hieronder
            op in het invulveld:</b></p>
    <br>
    <div class="enkelInvul"></div>
    <br>
    <br>
    <p class="normaaltekst" style="margin-bottom:5px;">Ga je deze Kracht meer voor jezelf inzetten of voor je omgeving,
        of beide? Kruis aan welke je nu kiest.</p>
    @include('report.pdf.partials.selectie')
    <p class="normaaltekst">Wil je een kracht meer inzetten? Zoek dan mensen op die die kracht hebben of uitstralen,
        zoals de mensen die
        je in de eerdere opdracht hebt opgeschreven.<br><br>
        <b>Heb je al een idee hoe je die kracht komende week gaat versterken of loslaten? Schrijf het hieronder op:</b>
    </p><br>
    <div class="grootInvul"></div>
</div>
@include('report.pdf.partials.copywrite')
<div class="page-break"></div>

@include('report.pdf.partials.logo')
<div class="content">
    <p class="Font14">Overzicht</p><br><br>
    <p class="normaaltekst"><b>Soms is het handig om op 1 a4tje een beeld te krijgen wat je kracht geeft, wat niet en
            wat je helpt weer
            sterker in balans te komen.<br>
            Wat geeft je een goed gevoel en/of brengt je Krachten eerder in balans</b></p>
    <div class="groterInvul"></div>
    <br><br><br>
    <p class="normaaltekst"><b>Wat geeft je een minder goed gevoel en/of haalt je uit je Kracht(en)?</b></p>
    <div class="groterInvul"></div>
    <br><br><br>
    <p class="normaaltekst"><b>Heb je een idee hoe je dan weer in je Kracht kunt komen? </b><b style="color:#55c3e9;">Schrijf
            het hieronder in punten op:</b></p>
    <div class="InvulContainer">
        <div class="invulBreed" style="margin-top:10px; margin-bottom:2px;"></div>
        <div class="invulBreed" style="margin-bottom:2px;"></div>
        <div class="invulBreed" style="margin-bottom:2px;"></div>
        <div class="invulBreed" style="margin-bottom:2px;"></div>
        <div class="invulBreed" style="margin-bottom:2px;"></div>
    </div>
</div>
@include('report.pdf.partials.copywrite')
<div class="page-break"></div>
@include('report.pdf.partials.logo')
<div class="content">
    <p class="Font14">HERHAALOPDRACHT VOOR PERSOONLIJKE GROEI - <a style="color:#55c3e9;">week 5</a></p><br>
    <p class="normaaltekst">Stel dat je jezelf een cijfer mag geven voor in hoeverre jij je krachten inzet, een cijfer
        tussen de 0 en 6. Waarbij 0 te weinig is, 6 te veel en 5 perfect. Welk cijfer geef je dan aan je krachten?
        <br><br>In hoeverre zet je deze voor je <b style="color:#55c3e9;">omgeving</b> in? Vink aan wat voor jou van
        toepassing is hieronder:</p>
    <br>
    @include('report.pdf.partials.table')
    <br>
    <p class="normaaltekst">In hoeverre zet je deze voor <b style="color:#55c3e9;">jezelf</b> in? Vink aan wat voor jou
        van toepassing is hieronder:</p>
    <br>
    @include('report.pdf.partials.table')
    <br>
    <p class="normaaltekst">Kies nu 1 Kracht uit die wat jou betreft de meeste aandacht verdient. Bijvoorbeeld omdat je
        deze mag loslaten
        of omdat je deze meer mag inzetten. <br><br>
        <b style="color:#55c3e9;">Kies er dus 1 uit en focus je daar de komende week op, schrijf deze Kracht hieronder
            op in het invulveld:</b></p>
    <br>
    <div class="enkelInvul"></div>
    <br>
    <br>
    <p class="normaaltekst" style="margin-bottom:5px;">Ga je deze Kracht meer voor jezelf inzetten of voor je omgeving,
        of beide? Kruis aan welke je nu kiest.</p>
    @include('report.pdf.partials.selectie')
    <p class="normaaltekst">Wil je een kracht meer inzetten? Zoek dan mensen op die die kracht hebben of uitstralen,
        zoals de mensen die
        je in de eerdere opdracht hebt opgeschreven.<br><br>
        <b>Heb je al een idee hoe je die kracht komende week gaat versterken of loslaten? Schrijf het hieronder op:</b>
    </p><br>
    <div class="grootInvul"></div>
</div>
@include('report.pdf.partials.copywrite')
<div class="page-break"></div>

@include('report.pdf.partials.logo')
<div class="content">
    <p class="Font14">HERHAALOPDRACHT VOOR PERSOONLIJKE GROEI - <a style="color:#55c3e9;">week 6</a></p><br>
    <p class="normaaltekst">Stel dat je jezelf een cijfer mag geven voor in hoeverre jij je krachten inzet, een cijfer
        tussen de 0 en 6. Waarbij 0 te weinig is, 6 te veel en 5 perfect. Welk cijfer geef je dan aan je krachten?
        <br><br>In hoeverre zet je deze voor je <b style="color:#55c3e9;">omgeving</b> in? Vink aan wat voor jou van
        toepassing is hieronder:</p>
    <br>
    @include('report.pdf.partials.table')
    <br>
    <p class="normaaltekst">In hoeverre zet je deze voor <b style="color:#55c3e9;">jezelf</b> in? Vink aan wat voor jou
        van toepassing is hieronder:</p>
    <br>
    @include('report.pdf.partials.table')
    <br>
    <p class="normaaltekst">Kies nu 1 Kracht uit die wat jou betreft de meeste aandacht verdient. Bijvoorbeeld omdat je
        deze mag loslaten
        of omdat je deze meer mag inzetten. <br><br>
        <b style="color:#55c3e9;">Kies er dus 1 uit en focus je daar de komende week op, schrijf deze Kracht hieronder
            op in het invulveld:</b></p>
    <br>
    <div class="enkelInvul"></div>
    <br>
    <br>
    <p class="normaaltekst" style="margin-bottom:5px;">Ga je deze Kracht meer voor jezelf inzetten of voor je omgeving,
        of beide? Kruis aan welke je nu kiest.</p>
    @include('report.pdf.partials.selectie')
    <p class="normaaltekst">Wil je een kracht meer inzetten? Zoek dan mensen op die die kracht hebben of uitstralen,
        zoals de mensen die
        je in de eerdere opdracht hebt opgeschreven.<br><br>
        <b>Heb je al een idee hoe je die kracht komende week gaat versterken of loslaten? Schrijf het hieronder op:</b>
    </p><br>
    <div class="grootInvul"></div>
</div>
@include('report.pdf.partials.copywrite')
<div class="page-break"></div>

@include('report.pdf.partials.logo')
<div class="content">
    <p class="Font14">HERHAALOPDRACHT VOOR PERSOONLIJKE GROEI - <a style="color:#55c3e9;">week 7</a></p><br>
    <p class="normaaltekst">Stel dat je jezelf een cijfer mag geven voor in hoeverre jij je krachten inzet, een cijfer
        tussen de 0 en 6. Waarbij 0 te weinig is, 6 te veel en 5 perfect. Welk cijfer geef je dan aan je krachten?
        <br><br>In hoeverre zet je deze voor je <b style="color:#55c3e9;">omgeving</b> in? Vink aan wat voor jou van
        toepassing is hieronder:</p>
    <br>
    @include('report.pdf.partials.table')
    <br>
    <p class="normaaltekst">In hoeverre zet je deze voor <b style="color:#55c3e9;">jezelf</b> in? Vink aan wat voor jou
        van toepassing is hieronder:</p>
    <br>
    @include('report.pdf.partials.table')
    <br>
    <p class="normaaltekst">Kies nu 1 Kracht uit die wat jou betreft de meeste aandacht verdient. Bijvoorbeeld omdat je
        deze mag loslaten
        of omdat je deze meer mag inzetten. <br><br>
        <b style="color:#55c3e9;">Kies er dus 1 uit en focus je daar de komende week op, schrijf deze Kracht hieronder
            op in het invulveld:</b></p>
    <br>
    <div class="enkelInvul"></div>
    <br>
    <br>
    <p class="normaaltekst" style="margin-bottom:5px;">Ga je deze Kracht meer voor jezelf inzetten of voor je omgeving,
        of beide? Kruis aan welke je nu kiest.</p>
    @include('report.pdf.partials.selectie')
    <p class="normaaltekst">Wil je een kracht meer inzetten? Zoek dan mensen op die die kracht hebben of uitstralen,
        zoals de mensen die
        je in de eerdere opdracht hebt opgeschreven.<br><br>
        <b>Heb je al een idee hoe je die kracht komende week gaat versterken of loslaten? Schrijf het hieronder op:</b>
    </p><br>
    <div class="grootInvul"></div>
</div>
@include('report.pdf.partials.copywrite')
<div class="page-break"></div>

@include('report.pdf.partials.logo')
<div class="floatingvak">
    <p class="Font26 wit">HURRAY!!!</p>
    <p class="normaaltekst wit"><b>Goed bezig {{ $client->first_name}}!
            Als je tot hier gekomen bent
            met het invullen, doe jezelf een plezier en geef jezelf iets leuks cadeau. Iets kleins of iets
            groots, dat mag je natuurlijk
            zelf weten. :-) JE HEBT HET
            VERDIEND!!!!!!!!!</b></p>
</div>
<br>
<img class="fullimage" src="{{ asset('images/rapport/festivrouw.png') }}"/>
@include('report.pdf.partials.copywrite-wit')
<div class="page-break"></div>

@include('report.pdf.partials.logo')
<div class="content">
    <p class="Font14">HERHAALOPDRACHT VOOR PERSOONLIJKE GROEI - <a style="color:#55c3e9;">week 8</a></p><br>
    <p class="normaaltekst">Stel dat je jezelf een cijfer mag geven voor in hoeverre jij je krachten inzet, een cijfer
        tussen de 0 en 6. Waarbij 0 te weinig is, 6 te veel en 5 perfect. Welk cijfer geef je dan aan je krachten?
        <br><br>In hoeverre zet je deze voor je <b style="color:#55c3e9;">omgeving</b> in? Vink aan wat voor jou van
        toepassing is hieronder:</p>
    <br>
    @include('report.pdf.partials.table')
    <br>
    <p class="normaaltekst">In hoeverre zet je deze voor <b style="color:#55c3e9;">jezelf</b> in? Vink aan wat voor jou
        van toepassing is hieronder:</p>
    <br>
    @include('report.pdf.partials.table')
    <br>
    <p class="normaaltekst">Kies nu 1 Kracht uit die wat jou betreft de meeste aandacht verdient. Bijvoorbeeld omdat je
        deze mag loslaten
        of omdat je deze meer mag inzetten. <br><br>
        <b style="color:#55c3e9;">Kies er dus 1 uit en focus je daar de komende week op, schrijf deze Kracht hieronder
            op in het invulveld:</b></p>
    <br>
    <div class="enkelInvul"></div>
    <br>
    <br>
    <p class="normaaltekst" style="margin-bottom:5px;">Ga je deze Kracht meer voor jezelf inzetten of voor je omgeving,
        of beide? Kruis aan welke je nu kiest.</p>
    @include('report.pdf.partials.selectie')
    <p class="normaaltekst">Wil je een kracht meer inzetten? Zoek dan mensen op die die kracht hebben of uitstralen,
        zoals de mensen die
        je in de eerdere opdracht hebt opgeschreven.<br><br>
        <b>Heb je al een idee hoe je die kracht komende week gaat versterken of loslaten? Schrijf het hieronder op:</b>
    </p><br>
    <div class="grootInvul"></div>
</div>
@include('report.pdf.partials.copywrite')
<div class="page-break"></div>

@include('report.pdf.partials.logo')
<div class="content">
    <p class="Font14">HERHAALOPDRACHT VOOR PERSOONLIJKE GROEI - <a style="color:#55c3e9;">week 9</a></p><br>
    <p class="normaaltekst">Stel dat je jezelf een cijfer mag geven voor in hoeverre jij je krachten inzet, een cijfer
        tussen de 0 en 6. Waarbij 0 te weinig is, 6 te veel en 5 perfect. Welk cijfer geef je dan aan je krachten?
        <br><br>In hoeverre zet je deze voor je <b style="color:#55c3e9;">omgeving</b> in? Vink aan wat voor jou van
        toepassing is hieronder:</p>
    <br>
    @include('report.pdf.partials.table')
    <br>
    <p class="normaaltekst">In hoeverre zet je deze voor <b style="color:#55c3e9;">jezelf</b> in? Vink aan wat voor jou
        van toepassing is hieronder:</p>
    <br>
    @include('report.pdf.partials.table')
    <br>
    <p class="normaaltekst">Kies nu 1 Kracht uit die wat jou betreft de meeste aandacht verdient. Bijvoorbeeld omdat je
        deze mag loslaten
        of omdat je deze meer mag inzetten. <br><br>
        <b style="color:#55c3e9;">Kies er dus 1 uit en focus je daar de komende week op, schrijf deze Kracht hieronder
            op in het invulveld:</b></p>
    <br>
    <div class="enkelInvul"></div>
    <br>
    <br>
    <p class="normaaltekst" style="margin-bottom:5px;">Ga je deze Kracht meer voor jezelf inzetten of voor je omgeving,
        of beide? Kruis aan welke je nu kiest.</p>
    @include('report.pdf.partials.selectie')
    <p class="normaaltekst">Wil je een kracht meer inzetten? Zoek dan mensen op die die kracht hebben of uitstralen,
        zoals de mensen die
        je in de eerdere opdracht hebt opgeschreven.<br><br>
        <b>Heb je al een idee hoe je die kracht komende week gaat versterken of loslaten? Schrijf het hieronder op:</b>
    </p><br>
    <div class="grootInvul"></div>
</div>
@include('report.pdf.partials.copywrite')
<div class="page-break"></div>

@include('report.pdf.partials.logo')
<div class="content">
    <p class="Font14">HERHAALOPDRACHT VOOR PERSOONLIJKE GROEI - <a style="color:#55c3e9;">week 10</a></p><br>
    <p class="normaaltekst">Stel dat je jezelf een cijfer mag geven voor in hoeverre jij je krachten inzet, een cijfer
        tussen de 0 en 6. Waarbij 0 te weinig is, 6 te veel en 5 perfect. Welk cijfer geef je dan aan je krachten?
        <br><br>In hoeverre zet je deze voor je <b style="color:#55c3e9;">omgeving</b> in? Vink aan wat voor jou van
        toepassing is hieronder:</p>
    <br>
    @include('report.pdf.partials.table')
    <br>
    <p class="normaaltekst">In hoeverre zet je deze voor <b style="color:#55c3e9;">jezelf</b> in? Vink aan wat voor jou
        van toepassing is hieronder:</p>
    <br>
    @include('report.pdf.partials.table')
    <br>
    <p class="normaaltekst">Kies nu 1 Kracht uit die wat jou betreft de meeste aandacht verdient. Bijvoorbeeld omdat je
        deze mag loslaten
        of omdat je deze meer mag inzetten. <br><br>
        <b style="color:#55c3e9;">Kies er dus 1 uit en focus je daar de komende week op, schrijf deze Kracht hieronder
            op in het invulveld:</b></p>
    <br>
    <div class="enkelInvul"></div>
    <br>
    <br>
    <p class="normaaltekst" style="margin-bottom:5px;">Ga je deze Kracht meer voor jezelf inzetten of voor je omgeving,
        of beide? Kruis aan welke je nu kiest.</p>
    @include('report.pdf.partials.selectie')
    <p class="normaaltekst">Wil je een kracht meer inzetten? Zoek dan mensen op die die kracht hebben of uitstralen,
        zoals de mensen die
        je in de eerdere opdracht hebt opgeschreven.<br><br>
        <b>Heb je al een idee hoe je die kracht komende week gaat versterken of loslaten? Schrijf het hieronder op:</b>
    </p><br>
    <div class="grootInvul"></div>
</div>
@include('report.pdf.partials.copywrite')
<div class="page-break"></div>

@include('report.pdf.partials.logo')
<div class="vak2">
    <p class="Font26 wit">TOPPER!!!</p>
    <p class="normaaltekst2 wit"><b>ALWEER DOOR NAAR WEEK
            11, DAAR WORD JE LEKKER <br>STERK VAN. GOED HOOR!
            <br>JE WORDT NU STEEDS<br>
            KRACHTIGER ZO.<br><br>
            Go {{ $client->first_name}}!<br>
            Go {{ $client->first_name}}!</b></p>
</div>
<img class="fullimage" src="{{ asset('images/rapport/arm.jpg') }}"/>
@include('report.pdf.partials.copywrite')
<div class="page-break"></div>
@include('report.pdf.partials.logo')
<div class="content">
    <p class="Font14">HERHAALOPDRACHT VOOR PERSOONLIJKE GROEI - <a style="color:#55c3e9;">week 11</a></p><br>
    <p class="normaaltekst">Stel dat je jezelf een cijfer mag geven voor in hoeverre jij je krachten inzet, een cijfer
        tussen de 0 en 6. Waarbij 0 te weinig is, 6 te veel en 5 perfect. Welk cijfer geef je dan aan je krachten?
        <br><br>In hoeverre zet je deze voor je <b style="color:#55c3e9;">omgeving</b> in? Vink aan wat voor jou van
        toepassing is hieronder:</p>
    <br>
    @include('report.pdf.partials.table')
    <br>
    <p class="normaaltekst">In hoeverre zet je deze voor <b style="color:#55c3e9;">jezelf</b> in? Vink aan wat voor jou
        van toepassing is hieronder:</p>
    <br>
    @include('report.pdf.partials.table')
    <br>
    <p class="normaaltekst">Kies nu 1 Kracht uit die wat jou betreft de meeste aandacht verdient. Bijvoorbeeld omdat je
        deze mag loslaten
        of omdat je deze meer mag inzetten. <br><br>
        <b style="color:#55c3e9;">Kies er dus 1 uit en focus je daar de komende week op, schrijf deze Kracht hieronder
            op in het invulveld:</b></p>
    <br>
    <div class="enkelInvul"></div>
    <br>
    <br>
    <p class="normaaltekst" style="margin-bottom:5px;">Ga je deze Kracht meer voor jezelf inzetten of voor je omgeving,
        of beide? Kruis aan welke je nu kiest.</p>
    @include('report.pdf.partials.selectie')
    <p class="normaaltekst">Wil je een kracht meer inzetten? Zoek dan mensen op die die kracht hebben of uitstralen,
        zoals de mensen die
        je in de eerdere opdracht hebt opgeschreven.<br><br>
        <b>Heb je al een idee hoe je die kracht komende week gaat versterken of loslaten? Schrijf het hieronder op:</b>
    </p><br>
    <div class="grootInvul"></div>
</div>
@include('report.pdf.partials.copywrite')
<div class="page-break"></div>

@include('report.pdf.partials.logo')
<div class="content">
    <p class="Font14">HERHAALOPDRACHT VOOR PERSOONLIJKE GROEI - <a style="color:#55c3e9;">week 12</a></p><br>
    <p class="normaaltekst">Stel dat je jezelf een cijfer mag geven voor in hoeverre jij je krachten inzet, een cijfer
        tussen de 0 en 6. Waarbij 0 te weinig is, 6 te veel en 5 perfect. Welk cijfer geef je dan aan je krachten?
        <br><br>In hoeverre zet je deze voor je <b style="color:#55c3e9;">omgeving</b> in? Vink aan wat voor jou van
        toepassing is hieronder:</p>
    <br>
    @include('report.pdf.partials.table')
    <br>
    <p class="normaaltekst">In hoeverre zet je deze voor <b style="color:#55c3e9;">jezelf</b> in? Vink aan wat voor jou
        van toepassing is hieronder:</p>
    <br>
    @include('report.pdf.partials.table')
    <br>
    <p class="normaaltekst">Kies nu 1 Kracht uit die wat jou betreft de meeste aandacht verdient. Bijvoorbeeld omdat je
        deze mag loslaten
        of omdat je deze meer mag inzetten. <br><br>
        <b style="color:#55c3e9;">Kies er dus 1 uit en focus je daar de komende week op, schrijf deze Kracht hieronder
            op in het invulveld:</b></p>
    <br>
    <div class="enkelInvul"></div>
    <br>
    <br>
    <p class="normaaltekst" style="margin-bottom:5px;">Ga je deze Kracht meer voor jezelf inzetten of voor je omgeving,
        of beide? Kruis aan welke je nu kiest.</p>
    @include('report.pdf.partials.selectie')
    <p class="normaaltekst">Wil je een kracht meer inzetten? Zoek dan mensen op die die kracht hebben of uitstralen,
        zoals de mensen die
        je in de eerdere opdracht hebt opgeschreven.<br><br>
        <b>Heb je al een idee hoe je die kracht komende week gaat versterken of loslaten? Schrijf het hieronder op:</b>
    </p><br>
    <div class="grootInvul"></div>
</div>
@include('report.pdf.partials.copywrite')
<div class="page-break"></div>
@include('report.pdf.partials.logo')
<div class="content">
    <p class="Font14 roze">REFLECTEER NOG 1 X MET DEZELFDE MENSEN!</p>
    <br>
    <p class="normaaltekst">Het is goed om zelf na te denken hoe jij je balans ziet {{$client->first_name}},
        maar het is minstens zo leerzaam om anderen te vragen hoe zij ernaar kijken. Zo heb je nog meer inzichten om op
        te bouwen en groeien. Het is leuk om dit samen te doen en er meteen over te praten, voorbeelden te vragen om te
        kijken waar concrete talenten en verbeter-punten zitten. Als collega’s of vrienden een cijfer mogen geven voor
        in hoeverre jij je krachten inzet, een cijfer tussen de 0 en 6. Waarbij 0 te weinig is, 6 te veel en 5 perfect.
        Welk cijfer geven zij dan aan je krachten?<br><br>
        Naam:</p>
    <div class="enkelInvul"></div>
    <p class="normaaltekst">In hoeverre vind jij dat {{$client->first_name}} deze kernkrachten inzet?</p>
    <br>
    @include('report.pdf.partials.table')
    <br>
    <p class="normaaltekst">Naam:</p>
    <div class="enkelInvul"></div>
    <p class="normaaltekst">In hoeverre vind jij dat {{$client->first_name}} deze kernkrachten inzet?</p>
    <br>
    @include('report.pdf.partials.table')
    <br>
    <p class="normaaltekst">Door hier over te praten leer je elkaar meteen beter kennen en weten anderen waar je
        talenten zitten.
        Dat is hartstikke leuk! <br><br>TweeKracht werkt voor individuen maar ook voor teams, organisaties en hun
        klanten. KernKrachten kunnen worden ingezet voor Persoonlijk Empowerment, Branding, HR. Toegepaste psychologie,
        Coaching, Matching, Communicatie- en Innovatie-trajecten.
    </p><br>
    <p class="Font14">Heb jij nog vragen of opmerkingen {{$client->first_name}}?</p>
    <p class="normaaltekst">Neem contact op met je coach. <br><br></p>

</div>
@include('report.pdf.partials.copywrite')
<div class="page-break"></div>

@include('report.pdf.partials.logo')
<div class="content">
    <br>
    <p class="Font50 roze">Yes {{ $client->first_name}}!</p>
    <p class="normaaltekst">Je hebt de laatste pagina bereikt, hoe voel je je nu in verhouding met toen je begon?</p>
    <br>

    <div class="selectie"></div>
    <img style="margin-top:5px; margin-left:-10px; margin-right:10px; height:19px; width:19px;"
         src="{{ asset('images/rapport/blauwbolletje.png') }}">
    <p class="tabeltekst">Hetzelfde</p><br>
    <div class="selectie"></div>
    <img style="margin-top:5px; margin-left:-10px; margin-right:10px; height:19px; width:19px;"
         src="{{ asset('images/rapport/blauwbolletje.png') }}">
    <p class="tabeltekst">Beter</p><br>
    <div class="selectie"></div>
    <img style="margin-top:5px; margin-left:-10px; margin-right:10px; height:19px; width:19px;"
         src="{{ asset('images/rapport/blauwbolletje.png') }}">
    <p class="tabeltekst">Helemaal te gek!</p><br>
    <div class="selectie"></div>
    <img style="margin-top:5px; margin-left:-10px; margin-right:10px; height:19px; width:19px;"
         src="{{ asset('images/rapport/blauwbolletje.png') }}">
    <p class="tabeltekst">Anders, namelijk</p><br>
    <div class="enkelInvul"></div>
    <br><br>
    <p class="normaaltekst">Waar kunnen we je NOG beter mee helpen in de toekomst?</p>
    <div class="invulBreed"></div>
</div>
<img class="jarigmeisje" src="{{ asset('images/rapport/jarigmeisje.jpg') }}"/>
@include('report.pdf.partials.copywrite-wit')

</body>
