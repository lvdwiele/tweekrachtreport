<div class="page-week-assignment">
	@include('report.pdf.partials.logo')
	<div class="content">
		<div class="h6">
			HERHAALOPDRACHT VOOR PERSOONLIJKE GROEI - <span
				class="text-blue">WEEK {{ $week }}</span>
		</div>
		<p>
			Stel dat je jezelf een cijfer mag geven voor in hoeverre jij je krachten inzet, een
			cijfer tussen de 0 en 6. Waarbij 0 te weinig is, 6 te veel en 5 perfect. Welk cijfer
			geef je dan aan je krachten?
		</p>
		<p>
			In hoeverre zet je deze voor je <b class="text-blue">omgeving</b> in? Vink aan wat voor
			jou van toepassing is hieronder:
		</p>
		@include('report.pdf.partials.table')
		<p>
			In hoeverre zet je deze voor <b class="text-blue">jezelf</b> in? Vink aan wat voor
			jou van toepassing is hieronder:
		</p>
		@include('report.pdf.partials.table')
		<p>
			Kies nu 1 Kracht uit die wat jou betreft de meeste aandacht verdient. Bijvoorbeeld omdat
			je deze mag loslaten of omdat je deze meer mag inzetten.
		</p>
		<p class="text-bold text-blue no-pb">
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
			Wil je een kracht meer inzetten? Zoek dan mensen op die die kracht hebben of uitstralen,
			zoals de mensen die je in de eerdere opdracht hebt opgeschreven.
		</p>
		<p class="text-bold">
			Heb je al een idee hoe je die kracht komende week gaat versterken of loslaten? Schrijf
			het hieronder op:
		</p>

		<div class="write-lines">
			<div class="line-big"></div>
		</div>
	</div>
	@include('report.pdf.partials.footer')
</div>
