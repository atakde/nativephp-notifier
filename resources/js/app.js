import './bootstrap';


const printOffer = item => `<div class="mt-0 divide-y divide-slate-400/25">
<div class="flex flex-col gap-4 py-4">
  <div class="flex items-center gap-4">
    <div>
      <img src="https://picsum.photos/32/32" alt="logo" />
    </div>
    <div>
      <div>
        <small class="text-gray-600">${item.creator}</small>
        <h3 class="font-semibold">${item.title}</h3>
      </div>
      <div class="flex gap-4 text-sm text-gray-600">
        <small>Full-time</small>
        <div class="flex gap-1">
          <img class="cursor-pointer" width="12" height="12" src="{{ asset('images/earth.svg') }}" />
          <small>Ankara / Turkey</small>
        </div>
        <small>${item.pubDate}</small>
      </div>
    </div>
  </div>
</div>
</div>`;
setInterval(async () => {
    const res = await fetch('/fetch');
    const offers = await res.json();
    if (offers.length == 0) {
        return;
    }
    let elements = '';
    offers.forEach(element => {
        console.log(element);
        elements += printOffer(element);
    });
    const offerDiv = document.querySelector('#list');
    offerDiv.innerHTML = elements;
}, 10000);
