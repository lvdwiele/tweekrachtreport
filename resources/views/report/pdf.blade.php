<!DOCTYPE html>
<html lang="nl">
<head>
	<title>Tweekracht | Rapport</title>
	<link rel="stylesheet" href="{{ asset('/css/pdf.css') }}">
</head>
<body>

<?php
/*
 * Debug page: remove comments to view basic styling elements
 * How to work with this PDF
 * It takes ages to render this PDF fully, so comment out all the pages that don't need changes
 * Then edit and render the thing. It's not ideal, but it works.

<div class="page--1">
	@include('report.pdf.partials.logo')
	<div class="content">
		<div class="h1">Dit is een h1</div>
		<div class="h2">Dit is een h2</div>
		<div class="h3">Dit is een h3</div>
		<div class="h4">Dit is een h4</div>
		<div class="h5">Dit is een h5</div>
		<div class="h6">Dit is een h6</div>
		<p>treft jou niet snel genoeg. Blijven leren en ontwikkelen is dan ook ongelofelijk
			belangrijk voor je en daar steek je vermoedelijk veel tijd in. Het kan je dan ook veel
			energie geven. Er moet groei in zitten. Daarnaast heb je de grappige eigenschap soms
			dingen ineens heel anders te doen dan anderen. Je hebt soms ineens een leuke creatieve
			twist in wat je doet en hoe je jezelf presenteert. Een unieke vorm van creativiteit</p>
	</div>
	@include('report.pdf.partials.footer')
</div>
<div class="page-break"></div>
*/
?>

<div class="page page-0">
	@include('report.pdf.partials.logo')
	<div class="bg-blue text-center">
		<div class="h1 text-white">De beste<br>Route naar<br>je beste ik</div>
		<img src="{{ asset('/images/rapport/alle_kaarten.png') }}" />
		<div class="h6 text-white">
			Kernkrachten van {{ $reportPdf->client->full_name }}
		</div>
	</div>
</div>

{{-- no need for a page break. It breaks automatically here --}}
{{--<div class="page-break"></div>--}}

<div class="page page-1 text-center">
	<div class="h2">GEFELICITEERD, <br> JE BENT BRILJANT!</div>
	<div class="diamond-container">
		<img class="diamond" src="{{ asset('/images/rapport/diamant2.jpg') }}" />
		<div class="circle circle-left"
		     style="background: {{ $reportPdf->firstCorePower->color }};"></div>
		<div class="circle circle-right"
		     style="background: {{ $reportPdf->secondCorePower->color }}"></div>
		<div class="circle circle-top" style="background: {{$reportPdf->getUpperColor()}}"></div>
		<div class="circle circle-bottom"
		     style="background: {{$reportPdf->getBottomColor()}}"></div>
		<div class="h3 power-text-top">{{ $reportPdf->getUpperPower() }}</div>
		<div class="h3 power-text-left">{{ $reportPdf->firstCorePower->power }}</div>
		<div class="h3 power-text-right">{{ $reportPdf->secondCorePower->power }}</div>
		<div class="h3 power-text-bottom">{{ $reportPdf->getBottomPower() }}</div>
	</div>
	<div class="h4">ALS JE JOUW UNIEKE TALENTEN<br> INZET NOG MEER</div>
	@include('report.pdf.partials.footer')
</div>
<div class="page-break"></div>

<div class="page">
	@include('report.pdf.partials.logo')
	<div class="content text-justify">
		<div class="h3">Jouw 2 unieke krachten</div>
		<p>
			Jij hebt 2 positieve KernKrachten die jou de meeste energie geven en je aantrekkelijk
			maken.<br> Deze laten zien welke mensen, organisaties, plekken en welke aanpak het beste
			bij jou passen en de meeste positieve energie geven. Met KernKrachten kun je je talenten
			onthullen, sterker in balans blijven en groeien.
		</p>
		<div class="h3" style="color:{{$reportPdf->firstCorePower->color}}">
			{{ $reportPdf->firstCorePower->power }}
		</div>
		<p>{{ $reportPdf->firstCorePower->description }}</p>
		<div class="h3" style="color:{{$reportPdf->secondCorePower->color}}">
			{{ $reportPdf->secondCorePower->power }}
		</div>
		<p>{{ $reportPdf->secondCorePower->description }}</p>
	</div>
	@include('report.pdf.partials.footer')
</div>
<div class="page-break"></div>


<div class="page page-3 text-white">
	@include('report.pdf.partials.logo')
	<div class="bg-pink">
		<div class="content text-justify">
			<div class="h5">
				TWEEKRACHT ONTHULT HET DIEPSTE <span class="text-black">WAAROM (WHY) VAN ORGANISATIES, TEAMS EN INDIVIDUEN.</span>
			</div>
			<div class="h5">
				DIT DOCUMENT IS GESCHREVEN EN OP MAAT GEMAAKT AAN DE HAND VAN JOUW PERSOONLIJKE
				IDENTITEIT.
			</div>
			<div class="h5">
				JE KUNT JEZELF AFVRAGEN <span class="text-black">WAAROM</span> JE DINGEN DOET,
				<span class="text-black">WAAROM</span> HET JE WEL OF GEEN ENERGIE GEEFT
				<span class="text-black">WAAROM</span> HET JOU EN ANDEREN OM JE HEEN AANTREKT. MAAR
				ER KOMT EEN MOMENT DAT JE GEEN ANTWOORD MEER WEET... JE KUNT GEEN DIEPERE LAAG MEER
				VINDEN <span class="text-black">WAAROM...</span>
			</div>
			<div class="h5">
				DIT WAREN DE MOMENTEN DIE WE TELKENS WEER TEGENKWAMEN TOEN WE MENSEN INTERVIEWDEN.
				VOORTDUREND IN EEN PATROON VAN 2 DINGEN. TELKENS WEER, KEER OP KEER. WE HEBBEN ZE
				KERNKRACHTEN GENOEMD.
			</div>
			<div class="h5">
				<span class="text-black">WAAROM?</span> OMDAT ZE IETS HEEL DIEPS,
				MOOIS EN KRACHTIGS IN JOU ONTHULLEN.
			</div>
		</div>
	</div>
	@include('report.pdf.partials.footer', ['color' => 'white'])
</div>
<div class="page-break"></div>


<div class="page page-4">
	@include('report.pdf.partials.logo')
	<div class="content">
		<div class="h2 text-blue text-center">
			WAAROM ZIJN KERNKRACHTEN NUTTIG VOOR JOU PERSOONLIJK?
		</div>

		<div class="card">
			<div class="h6 text-center text-white">MEER ENERGIE</div>
			<p class="text-justify">Jouw unieke 2 KernKrachten geven jou de meeste energie. Naast
				slapen en relaxen natuur- lijk. Als je in je KernKracht(en) staat en in beweging
				bent, krijg je eerder energie dan dat het je energie kost. Top toch!</p>
		</div>

		<div class="card">
			<div class="h6 text-center text-white">EEN BAAN</div>
			<p class="text-justify">Wat voor een werkgever en col- lega’s passen bij jou? En welke
				manier van werken geeft je de meeste energie en kracht? Op die vragen kun je meer
				inzichten vinden met hulp van jouw 2 persoonlijke KernKrachten.</p>
		</div>

		<div class="card">
			<div class="h6 text-center text-white">BETERE KEUZES</div>
			<p class="text-justify">We kunnen natuurlijk nooit een keuze voor jou maken. Wel kunnen
				we jou tools geven om jouw keuzes te versterken. Keu- zes die je gelukkig en sterk
				ma- ken. Die hulp en inzichten geven we a.d.h.v. jouw 2 KernKrachten.</p>
		</div>
		<br>
		<div class="card">
			<div class="h6 text-center text-white">MATCHING</div>
			<p class="text-justify">Wie of wat past bij jou? Waar krijg je de meeste goede vibes
				van? Daar zitten ook jouw matches in verborgen. Want natuurlijk zoek je liever
				datgene op waar je fijne energie van krijgt. KernKrachten helpen daarbij.</p>
		</div>

		<div class="card">
			<div class="h6 text-center text-white">POSITIVITEIT</div>
			<p class="text-justify">Wij geloven in mooie eigen- schappen en talenten. In mat- ches
				of mis-matches in plaats van afwijzing. Je kunt altijd zelf kiezen hoe je naar
				dingen kijkt. Positiviteit brengt je daarin verder. Deze versterken we graag!</p>
		</div>

		<div class="card">
			<div class="h6 text-center text-white">ZELFBEWUSTZIJN</div>
			<p class="text-justify">Fijn als je jezelf in 2 woorden kan
				omschrijven {{ $client->first_name}}. Twee KernKrachten die je voorkeuren, talenten
				en handelen onthullen, dat wat jou mooi en aantrekke- lijk maakt. Dit zelf-begrip
				geeft je meer innerlijke rust en zelfinzicht.</p>
		</div>
	</div>
	@include('report.pdf.partials.footer')
</div>
<div class="page-break"></div>

<div class="page page-5">
	@include('report.pdf.partials.logo')
	<div class="content text-justify">
		<div class="h3">Jouw hulpkrachten</div>
		<p class="font-bold">
			{{ $client->first_name }}, jouw persoonlijke HulpKrachten zijn
			<span
				style="color:{{ $reportPdf->firstSupportPower->color }}">{{ $reportPdf->firstSupportPower->power }}</span>
			en <span
				style="color:{{ $reportPdf->secondSupportPower->color }}">{{ $reportPdf->secondSupportPower->power }}</span>.
		</p>
		<p>
			Hulpkrachten zijn krachten die je in balans brengen. In dit geval laten ze jouw
			KernKrachten:<br><span>{{ $reportPdf->firstCorePower->power }}</span> en
			<span>{{ $reportPdf->secondCorePower->power }}</span> beter/positiever samenwerken. Ze
			zijn
			niet het allersterkst in jou aanwezig (zoals
			<span>{{ $reportPdf->firstCorePower->power }}</span> en
			<span>{{ $reportPdf->secondCorePower->power }}</span> maar zijn waarschijnlijk wel heel
			belangrijk voor je. Het is iets dat je vermoedelijk oprecht ook kunt waarderen en mooi
			vindt in andere mensen, denk er maar eens over na. Als jij je persoonlijke
			hulpkrachten inzet voor jezelf, dan zul je merken dat jij je gebalanceerder, energieker
			en rustiger gaat voelen. Het stimuleert jouw KernKrachten om beter en prettiger samen te
			werken. Je kunt dit in jezelf stimuleren door in je eigen houding en gedrag
			meer <span>{{ $reportPdf->firstSupportPower->power }}</span> en
			<span>{{ $reportPdf->secondSupportPower->power }}</span>
			te zijn, maar wat ook goed voor je werkt is om andere mensen vaker op te zoeken die van
			nature meer
			<span>{{ $reportPdf->firstSupportPower->power }}</span> en
			<span>{{ $reportPdf->secondSupportPower->power }}</span>
			zijn. Als een externe stimulans voor jezelf om sterker hierin te worden. Hieronder staat
			meer tekst en uitleg over jouw persoonlijke Hulpkrachten.
		</p>
		<div class="h3" style="color:{{ $reportPdf->firstSupportPower->color }}">
			{!! $reportPdf->firstSupportPower->power !!}</div>
		<p>
			{!! $reportPdf->firstSupportPower->description !!}
		</p>
		<div class="h3" style="color:{{ $reportPdf->secondSupportPower->color }}">
			{!! $reportPdf->secondSupportPower->power !!}
		</div>
		<p>
			{!! $reportPdf->secondSupportPower->description !!}
		</p>
	</div>
	@include('report.pdf.partials.footer')
</div>
<div class="page-break"></div>

<div class="page">
	@include('report.pdf.partials.logo')
	<div class="content">
		<div class="h5">VOORBEELD HERHAALOPDRACHT VOOR PERSOONLIJKE GROEI</div>
		<div class="text-justify">
			<p>
				Stel dat je jezelf een cijfer mag geven voor in hoeverre jij je krachten inzet, een
				cijfer tussen de 0 en 6. Waarbij 0 te weinig is, 6 te veel en 5 perfect. Welk cijfer
				geef je dan aan je krachten?
			</p>
			<p>
				In hoeverre zet je deze voor je omgeving in? Geef hieronder aan wat voor jou van
				toepassing is in het voorbeeld.
			</p>
			@include('report.pdf.partials.table')
			<p>In hoeverre zet je deze voor jezelf in {{$client->first_name }}?</p>
			@include('report.pdf.partials.table')
			<p>
				Kies met regelmaat een Kracht uit die wat jou betreft de meeste aandacht verdient.
				Bijvoorbeeld omdat je deze mag loslaten of omdat je deze meer mag inzetten.
			</p>
			<p>
				Probeer het een paar dagen en kijk dan weer terug naar je cijferlijst. Start bij
				voorkeur met in hoeverre je het in je omgeving inzet. Maar mocht je liever beginnen
				met in hoeverre je het voor jezelf inzet, dan houden we je natuurlijk niet tegen. :)
			</p>
			<p>
				Blijf je resultaat meten, a.d.h.v. je eigen perceptie. Hoe jij het ziet. Ben je er
				op vooruit gegaan? Mooi! Dan kun je jezelf weer een nieuwe challenge geven. Dus weer
				1 Kracht kiezen en deze bewust een tijdje meer of minder in te zetten. Je zult je
				dan al snel beter gaan voelen en merken dat dingen in je leven ‘soepeler’ lopen. Het
				geeft je als het goed is meer energie. Ons doel is dat je alle krachten straks een
				cijfer 5 kunt geven. Of in ieder geval dit blijft nastreven.
			</p>
		</div>
	</div>
	@include('report.pdf.partials.footer')
</div>
<div class="page-break"></div>

<div class="page page-7">
	@include('report.pdf.partials.logo')
	<div class="content">
		<div class="h4">GOED OM TE WETEN</div>
		<p>
			Misschien valt het je wel op als je de oefening doet, maar we komen regelmatig een
			patroon tegen als mensen een cijfer geven aan in ‘hoeverre’ ze hun Krachten wel of niet
			inzetten. Dat patroon is dat als je een kracht minder inzet, dit over het algemeen niet
			ontstaan is vanuit het innerlijk maar vanuit factoren om je heen, je omgeving.
		</p>
		<p>
			<b>Het minder inzetten van krachten</b> die in je zitten is ontstaan uit (meestal minder
			leuke) ervaringen die je hebt opgedaan in het verleden of (nog steeds opdoet) in je
			omgeving. We vragen je niet perse om te focussen op deze dingen, maar vooral om het
			lekker los te laten en dichter bij jezelf te komen. Op te laden en te genieten van wie
			je bent en wat je te brengen hebt aan je omgeving/ de mensen om je heen die ook houden
			van de Krachten die jou het meeste energie geven. Want die mensen zijn er
			absoluut!
		</p>
		<p class="font-bold">
			Hoe meer jij vanuit je eigen krachten handelt en doet, hoe meer je deze mensen en
			plaatsen ook zult aantrekken en vinden. Zo zet je in jezelf een positief effect aan die
			je aan de hand van deze oefening telkens weer opnieuw kunt (en mag) aanzwengelen.
		</p>

		<div class="write-lines">
			@foreach(range(1, 7) as $i)
				<div></div>
			@endforeach
		</div>

		<img class="denkvrouw" src="{{ asset('/images/rapport/denkvrouw.jpg') }}" />
	</div>
	@include('report.pdf.partials.footer')
</div>
<div class="page-break"></div>

<div class="page">
	@include('report.pdf.partials.logo')
	<div class="content">
		<div class="h4">REFLECTEREN MET ANDEREN</div>
		<p>
			Het is goed om zelf na te denken hoe jij je balans ziet, maar het is minstens zo
			leerzaam om anderen te vragen hoe zij ernaar kijken. Zo heb je nog meer inzichten om op
			te bouwen en groeien. Het is leuk om dit samen te doen en er meteen over te praten,
			voorbeelden te vragen om te kijken waar concrete talenten en verbeter-punten zitten. Als
			collega’s of vrienden een cijfer mogen geven voor in hoeverre jij je krachten inzet, een
			cijfer tussen de 0 en 6. Waarbij 0 te weinig is, 6 te veel en 5 perfect. Welk cijfer
			geven zij dan aan je
			krachten?
		</p>
		<p class="no-pb">Naam:</p>
		<div class="write-lines">
			<div class="line-small"></div>
		</div>
		<p>In hoeverre vind jij dat {{$client->first_name}} deze kernkrachten inzet?</p>
		@include('report.pdf.partials.table')
		<p class="no-pb">Naam:</p>
		<div class="write-lines">
			<div class="line-small"></div>
		</div>
		<p>In hoeverre vind jij dat {{$client->first_name}} deze kernkrachten
			inzet?</p>
		@include('report.pdf.partials.table')
		<p>
			Door hier over te praten leer je elkaar meteen beter kennen en weten anderen waar je
			talenten zitten. Dat is hartstikke leuk!
		</p>
		<p>
			TweeKracht werkt voor individuen maar ook voor teams, organisaties en hun klanten.
			KernKrachten kunnen worden ingezet voor Persoonlijk Empowerment, Branding, HR.
			Toegepaste psychologie, Coaching, Matching, Communicatie- en Innovatie-trajecten.
		</p>

		<div class="h4">Heb jij nog vragen of opmerkingen {{$client->first_name}}?</div>
		<p>Neem contact op met je coach.</p>
	</div>
	@include('report.pdf.partials.footer')
</div>
<div class="page-break"></div>

<div class="page">
	@include('report.pdf.partials.logo')
	<div class="content">
		<div class="h6">HERHAALOPDRACHT VOOR PERSOONLIJKE GROEI - <span
				class="text-blue">start</span>
		</div>
		<p>
			Stel dat je jezelf een cijfer mag geven voor in hoeverre jij je krachten inzet, een
			cijfer tussen de 0 en 6. Waarbij 0 te weinig is, 6 te veel en 5 perfect. Welk cijfer
			geef je dan aan je krachten?
		</p>
		<p>
			In hoeverre zet je deze voor je <b class="text-blue">omgeving</b> in? Vink aan wat
			voor jou van toepassing is hieronder:
		</p>
		@include('report.pdf.partials.table')
		<p>
			In hoeverre zet je deze voor <b class="text-blue">jezelf</b> in? Vink aan wat voor jou
			van toepassing is hieronder:
		</p>
		@include('report.pdf.partials.table')
		<p>
			Kies nu 1 Kracht uit die wat jou betreft de meeste aandacht verdient. Bijvoorbeeld omdat
			je deze mag loslaten of omdat je deze meer mag inzetten.
		</p>
		<p class="text-bold text-blue">
			Kies er dus 1 uit en focus je daar de komende week op, schrijf deze Kracht hieronder op
			in het invulveld:
		</p>
		<div class="write-lines">
			<div class="line-small"></div>
		</div>
		<p>
			Ga je deze Kracht meer voor jezelf inzetten of voor je omgeving, of beide? Kruis aan
			welke je nu kiest.
		</p>
		<ul class="select select-horizontal">
			<li>Mezelf</li>
			<li>Mijn omgeving</li>
			<li>Beide</li>
		</ul>
		<p>
			Probeer het een paar dagen en kijk dan weer terug naar je cijferlijst. Start bij
			voorkeur met in hoeverre je het in je omgeving inzet. Maar mocht je liever beginnen met
			in hoeverre je het voor jezelf inzet, dan houden we je natuurlijk niet tegen. :)
		</p>
		<p>
			<b>Blijf je resultaat meten, a.d.h.v. je eigen perceptie. Hoe jij het ziet.</b><br>
			Ben je er op vooruit gegaan? Mooi! Dan kun je jezelf weer een nieuwe challenge geven.
			Dus weer 1 Kracht kiezen en deze bewust een tijdje meer of minder in te zetten. Je zult
			je dan al snel beter gaan voelen en merken dat dingen in je leven ‘soepeler’ lopen. Het
			geeft je als het goed is meer energie. Ons doel is dat je alle krachten
			straks een cijfer 5 kunt geven. Of in ieder geval dit blijft nastreven.
		</p>
	</div>
	@include('report.pdf.partials.footer')
</div>
<div class="page-break"></div>

<div class="page">
	@include('report.pdf.partials.logo')
	<div class="content">
		<div class="h5">WELKE MENSEN KEN JIJ, DIE - <span class="text-blue">vul in</span></div>
		<p>
			Mensen die het gedrag van jouw krachten of KernKrachten vertonen geven je als het goed
			is extra positieve energie en balans. Het is dus goed eens te kijken wie dat zijn. Micht
			je 1 van je krachten willen versterken, dan is het ook zinvol deze mensen meer te
			zien/met ze af te spreken, het helpt je sneller in balans. Dus wie ken jij die volgens
			jou het volgende gedrag veel of regelmatig vertoont? Wie is er volgens jou...
		</p>
		<p>
			Vul hieronder de namen in van mensen die dit volgens jou hebben/ vaak vertonen of zijn:
		</p>
		@include('report.pdf.partials.power-lines')

	</div>
	@include('report.pdf.partials.footer')
</div>
<div class="page-break"></div>

<div class="page">
	@include('report.pdf.partials.logo')
	<div class="content">
		<div class="h5">WELKE PLEKKEN KEN JIJ, DIE - <span class="text-blue">vul in</span></div>
		<p>
			Plekken die die passen bij jouw krachten of KernKrachten. Als het goed is geven deze je
			extra positieve energie en balans. Het is dus goed om eens te kijken weke plekken dat
			zijn. Dit kan werkelijk van alles zijn. Denk aan bepaalde landen of steden. Plekken in
			de natuur. Maar ook plekken in de buurt, zoals favoriete kroeg of museum. Plekken waar
			je geweest bent of waar je nog naartoe wilt gaan. Mocht je 1 van je krachten willen
			versterken, dan is het zinvol deze plekken vaker op te zoeken, het helpt je sneller in
			balans. Vul hieronder de plekken in die dit volgens jou hebben of zijn, alles mag en
			kan!
		</p>
		@include('report.pdf.partials.power-lines')
	</div>
	@include('report.pdf.partials.footer')
</div>
<div class="page-break"></div>

<div class="page">
	@include('report.pdf.partials.logo')
	<div class="content">
		<div class="h6">
			WELKE BOEKEN, FILMS OF MUZIEK KEN JIJ, DIE - <span class="text-blue">vul
				in</span>
		</div>
		<p>
			Boeken, films of muziek die passen bij jouw krachten of KernKrachten geven je als het
			goed is ook extra positieve energie en balans. Het is dus goed eens te kijken welke dat
			zijn. Mocht je 1 van je krachten willen versterken, dan is het ook zinvol dit soort
			boeken, films of muziek vaker te lezen, te bekijken of te beluisteren, het helpt je
			sneller in balans. Dus welke boeken, films of muziek is er volgens jou...
			<br> Ps: Wil je extra inspiratie? Vraag dan mensen in de omgeving waar zij aan moeten
			denken als ze jouw KernKrachten lezen. Wie weet wat je nog allemaal ontdekt en vindt!
			Vul hieronder titels van boeken of films of muziek in die volgens jou passen bij jouw
			krachten:
		</p>
		@include('report.pdf.partials.power-lines')
	</div>
	@include('report.pdf.partials.footer')
</div>
<div class="page-break"></div>

<div class="page">
	@include('report.pdf.partials.logo')
	<div class="content">
		<div class="h6">
			WELKE ACTIVITEITEN KEN JIJ, DIE - <span class="text-blue">vul
				in</span>
		</div>
		<p>
			Activiteiten die passen bij jouw krachten of KernKrachten geven je als het goed is extra
			positieve energie en balans. Het is dus goed eens te kijken welke dat zijn. Denk aan
			hobbies, sporten, uitjes, enzovoorts. Mocht je 1 van je krachten willen versterken, dan
			is het ook zinvol deze activiteiten vaker te doen, het helpt je sneller in balans. Dus
			welke activiteiten versterken volgens jou...
		</p>
		<p>Vul hieronder de namen in van activiteiten die dit volgens jou hebben of zijn:</p>
		@include('report.pdf.partials.power-lines')
	</div>
	@include('report.pdf.partials.footer')
</div>
<div class="page-break"></div>

<div class="page">
	@include('report.pdf.partials.logo')
	<div class="content">
		<div class="h6">
			WELKE STIJL PAST BIJ JOU, DIE - <span class="text-blue">vul
				in</span>
		</div>
		<p>
			Uit jouw stijl! Stijl die past bij jouw krachten of KernKrachten geeft je als het goed
			is extra positieve energie en
			balans. Het is dus goed eens te kijken waar dat allemaal in terugkomt. Denk aan kleding,
			straalt die wel uit
			hoe jij je het liefste voelt? En je interieur van je woning bijvoorbeeld. Of kunst die
			je aan de muur hangt. De
			auto of fiets waar je je op voortbeweegt. Mocht je 1 van je krachten willen versterken,
			dan is het ook zinvol
			jouw stijl meer te gaan uitstralen, het helpt je sneller in balans. Vul hieronder in wat
			jouw stijl is in kleding,
			interieur, etc.:
		</p>
		@include('report.pdf.partials.power-lines')
	</div>
	@include('report.pdf.partials.footer')
</div>
<div class="page-break"></div>

@foreach(range(1, 2) as $week)
	@include('report.pdf.partials.page-week-assigment', ['week' => $week])
	<div class="page-break"></div>
@endforeach

<div class="page page-18">
	@include('report.pdf.partials.logo')
	<div class="content">
		<div class="h5">en, {{ $client->first_name}}?</div>
		<p>Hoe staat het nu met je energiepeil? </p>
		<p>Krijg je nog steeds zo veel energie van</p>
		<div class="h3">
			<span style="color:{{$reportPdf->firstCorePower->color}}">
				{{ $reportPdf->firstCorePower->power }}
			</span>
			<br>&
			<span style="color:{{$reportPdf->secondCorePower->color}}">
				{{ $reportPdf->secondCorePower->power }}
			</span>?
		</div>
		<div class="h5">
			<span class="text-green">ZO jA.</span> Helemaal goed! ga zo door.
		</div>
		<div class="h5"><span class="text-red">ZO NEE.</span> Geen probleem!</div>
		<p>
			Dan is het goed om te kijken of je KernKrachten wel kloppen door nog eens een test af te
			leggen. Het kan zijn dat je uitslag tot nu toe niet helemaal klopte. Dat gebeurt wel
			eens en is helemaal niet erg. Het kan dan zijn dat je met het vinden van je KernKrachten
			(onbewust) teveel rekening hebt gehouden met de wensen van anderen of in een omgeving
			werkt of leeft waar je een aantal KernKrachten nog niet helemaal hebt kunnen toepassen.
		</p>
		<p>
			Het voordeel is dat je nu nog dichter bij jezelf komt omdat je weet wat het
			niet is. <br> Een idee kan zijn om eens opnieuw de test/het spel te doen en andere
			kleuren te <br> kiezen dan die je nu gekozen hebt. Soms zorgt dat voor opzienbarende
			inzichten.
		</p>
	</div>
	<img class="full-image-bottom" src="{{ asset('/images/rapport/roltrappen.jpg') }}" />
	@include('report.pdf.partials.footer', ['color' => 'white'])
</div>
<div class="page-break"></div>

@foreach(range(3, 4) as $week)
	@include('report.pdf.partials.page-week-assigment', ['week' => $week])
	<div class="page-break"></div>
@endforeach

<div class="page">
	@include('report.pdf.partials.logo')
	<div class="content">
		<div class="h4">Overzicht</div>
		<p class="text-bold">
			Soms is het handig om op 1 a4tje een beeld te krijgen wat je kracht geeft, wat niet en
			wat je helpt weer sterker in balans te komen.
		</p>
		<p class="text-bold">
			Wat geeft je een goed gevoel en/of brengt je Krachten eerder in balans
		</p>
		<div class="write-lines">
			<div class="line-big"></div>
		</div>
		<p class="text-bold">
			Wat geeft je een minder goed gevoel en/of haalt je uit je Kracht(en)?
		</p>
		<div class="write-lines">
			<div class="line-big"></div>
		</div>
		<p>
			<b>Heb je een idee hoe je dan weer in je Kracht kunt komen? </b>
			<b class="text-blue">Schrijf het hieronder in punten op:</b>
		</p>
		<div class="write-lines">
			@foreach(range(1, 5) as $i)
				<div></div>
			@endforeach
		</div>
	</div>
	@include('report.pdf.partials.footer')
</div>
<div class="page-break"></div>

@foreach(range(5, 7) as $week)
	@include('report.pdf.partials.page-week-assigment', ['week' => $week])
	<div class="page-break"></div>
@endforeach

<div class="page page-25">
	@include('report.pdf.partials.logo')
	<div class="card bg-blue text-white text-justify">
		<div class="h3">HURRAY!!!</div>
		<p>
			Goed bezig {{ $client->first_name}}! Als je tot hier gekomen bent met het invullen, doe
			jezelf een plezier en geef jezelf iets leuks cadeau. Iets kleins of iets groots, dat mag
			je natuurlijk zelf weten. :-) JE HEBT HET VERDIEND!!!!!!!!!
		</p>
	</div>
	<img class="full-image-bottom" src="{{ asset('/images/rapport/festivrouw.jpg') }}" />
	@include('report.pdf.partials.footer', ['color'=> 'white'])
</div>
<div class="page-break"></div>

@foreach(range(8, 10) as $week)
	@include('report.pdf.partials.page-week-assigment', ['week' => $week])
	<div class="page-break"></div>
@endforeach


<div class="page page-29">
	@include('report.pdf.partials.logo')
	<div class="content card bg-pink text-white text-justify">
		<div class="h3 no-pb">TOPPER!!!</div>
		<p class="text-bold">
			ALWEER DOOR NAAR WEEK 11, DAAR WORD JE LEKKER <br>
			STERK VAN. GOED HOOR! <br>
			JE WORDT NU STEEDS<br>
			KRACHTIGER ZO.
		</p>
		<p class="text-bold">
			Go {{ $client->first_name}}!<br>
			Go {{ $client->first_name}}!
		</p>
	</div>
	<img class="full-image-bottom" src="{{ asset('/images/rapport/arm.jpg') }}" />
	@include('report.pdf.partials.footer', ['color'=> 'white'])
</div>
<div class="page-break"></div>

@foreach(range(11, 12) as $week)
	@include('report.pdf.partials.page-week-assigment', ['week' => $week])
	<div class="page-break"></div>
@endforeach

<div class="page">
	@include('report.pdf.partials.logo')
	<div class="content">
		<div class="h4 text-pink">REFLECTEER NOG 1 X MET DEZELFDE MENSEN!</div>
		<p>
			Het is goed om zelf na te denken hoe jij je balans ziet Aaltje, maar het is minstens zo
			leerzaam om anderen te vragen hoe zij ernaar kijken. Zo heb je nog meer inzichten om op
			te bouwen en groeien. Het is leuk om dit samen te doen en er meteen over te praten,
			voorbeelden te vragen om te kijken waar concrete talenten en verbeter-punten zitten. Als
			collega’s of vrienden een cijfer mogen geven voor in hoeverre jij je krachten inzet, een
			cijfer tussen de 0 en 6. Waarbij 0 te weinig is, 6 te veel en 5 perfect. Welk cijfer
			geven zij dan aan je krachten?
		</p>
		<p class="no-pb">Naam:</p>
		<div class="write-lines">
			<div class="line-small"></div>
		</div>
		<p>In hoeverre vind jij dat {{$client->first_name}} deze kernkrachten inzet?</p>
		@include('report.pdf.partials.table')
		<p class="no-pb">Naam:</p>
		<div class="write-lines">
			<div class="line-small"></div>
		</div>
		<p>
			In hoeverre vind jij dat {{$client->first_name}} deze kernkrachten inzet?
		</p>
		@include('report.pdf.partials.table')
		<p>
			Door hier over te praten leer je elkaar meteen beter kennen en weten anderen waar je
			talenten zitten. Dat is hartstikke leuk!
		</p>
		<p>
			TweeKracht werkt voor individuen maar ook voor teams, organisaties en hun klanten.
			KernKrachten kunnen worden ingezet voor Persoonlijk Empowerment, Branding, HR.
			Toegepaste psychologie, Coaching, Matching, Communicatie- en Innovatie-trajecten.
		</p>

		<div class="h4">Heb jij nog vragen of opmerkingen {{$client->first_name}}?</div>
		<p>Neem contact op met je coach.</p>
	</div>
	@include('report.pdf.partials.footer')
</div>
<div class="page-break"></div>

<div class="page">
	@include('report.pdf.partials.logo')
	<div class="content">
		<div class="h2 text-pink">Yes {{ $client->first_name}}!</div>
		<p>
			Je hebt de laatste pagina bereikt, hoe voel je je nu in verhouding met toen je
			begon?
		</p>

		<ul class="select">
			<li>Hetzelfde</li>
			<li>Beter</li>
			<li>Helemaal te gek!</li>
			<li>Anders, namelijk</li>
		</ul>

		<div class="write-lines">
			<div class="line-small"></div>
		</div>

		<p>Waar kunnen we je NOG beter mee helpen in de toekomst?</p>
		<div class="write-lines">
			<div></div>
		</div>
	</div>
	<img class="full-image-bottom" src="{{ asset('/images/rapport/jarigmeisje.jpg') }}" />
	@include('report.pdf.partials.footer', ['color' => 'white'])
</div>

</body>
</html>
