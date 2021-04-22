# Weapon


## api/weapon




> Example request:

```bash
curl -X GET \
    -G "http://localhost:8989/api/weapon?language=quas" \
    -H "Content-Type: application/json" \
    -H "Accept: application/json"
```

```javascript
const url = new URL(
    "http://localhost:8989/api/weapon"
);

let params = {
    "language": "quas",
};
Object.keys(params)
    .forEach(key => url.searchParams.append(key, params[key]));

let headers = {
    "Content-Type": "application/json",
    "Accept": "application/json",
};


fetch(url, {
    method: "GET",
    headers,
}).then(response => response.json());
```


> Example response (200):

```json
[
    {
        "id": 1,
        "name": "Buster Sword I",
        "type": "great-sword",
        "rarity": 1,
        "url": "http:\/\/localhost:8989\/api\/weapon\/1"
    },
    {
        "id": 89,
        "name": "Iron Katana I",
        "type": "long-sword",
        "rarity": 1,
        "url": "http:\/\/localhost:8989\/api\/weapon\/89"
    },
    {
        "id": 170,
        "name": "Hunter's Knife I",
        "type": "sword-and-shield",
        "rarity": 1,
        "url": "http:\/\/localhost:8989\/api\/weapon\/170"
    },
    {
        "id": 262,
        "name": "Matched Slicers I",
        "type": "dual-blades",
        "rarity": 1,
        "url": "http:\/\/localhost:8989\/api\/weapon\/262"
    },
    {
        "id": 345,
        "name": "Iron Hammer I",
        "type": "hammer",
        "rarity": 1,
        "url": "http:\/\/localhost:8989\/api\/weapon\/345"
    },
    {
        "id": 429,
        "name": "Metal Bagpipe I",
        "type": "hunting-horn",
        "rarity": 1,
        "url": "http:\/\/localhost:8989\/api\/weapon\/429"
    },
    {
        "id": 514,
        "name": "Iron Lance I",
        "type": "lance",
        "rarity": 1,
        "url": "http:\/\/localhost:8989\/api\/weapon\/514"
    },
    {
        "id": 598,
        "name": "Iron Gunlance I",
        "type": "gunlance",
        "rarity": 1,
        "url": "http:\/\/localhost:8989\/api\/weapon\/598"
    },
    {
        "id": 677,
        "name": "Proto Iron Axe I",
        "type": "switch-axe",
        "rarity": 1,
        "url": "http:\/\/localhost:8989\/api\/weapon\/677"
    },
    {
        "id": 756,
        "name": "Proto Commission Axe I",
        "type": "charge-blade",
        "rarity": 1,
        "url": "http:\/\/localhost:8989\/api\/weapon\/756"
    },
    {
        "id": 831,
        "name": "Iron Blade I",
        "type": "insect-glaive",
        "rarity": 1,
        "url": "http:\/\/localhost:8989\/api\/weapon\/831"
    },
    {
        "id": 912,
        "name": "Chain Blitz I",
        "type": "light-bowgun",
        "rarity": 1,
        "url": "http:\/\/localhost:8989\/api\/weapon\/912"
    },
    {
        "id": 996,
        "name": "Iron Assault I",
        "type": "heavy-bowgun",
        "rarity": 1,
        "url": "http:\/\/localhost:8989\/api\/weapon\/996"
    },
    {
        "id": 1075,
        "name": "Iron Bow I",
        "type": "bow",
        "rarity": 1,
        "url": "http:\/\/localhost:8989\/api\/weapon\/1075"
    }
]
```
<div id="execution-results-GETapi-weapon" hidden>
    <blockquote>Received response<span id="execution-response-status-GETapi-weapon"></span>:</blockquote>
    <pre class="json"><code id="execution-response-content-GETapi-weapon"></code></pre>
</div>
<div id="execution-error-GETapi-weapon" hidden>
    <blockquote>Request failed with error:</blockquote>
    <pre><code id="execution-error-message-GETapi-weapon"></code></pre>
</div>
<form id="form-GETapi-weapon" data-method="GET" data-path="api/weapon" data-authed="0" data-hasfiles="0" data-headers='{"Content-Type":"application\/json","Accept":"application\/json"}' onsubmit="event.preventDefault(); executeTryOut('GETapi-weapon', this);">
<h3>
    Request&nbsp;&nbsp;&nbsp;
        <button type="button" style="background-color: #8fbcd4; padding: 5px 10px; border-radius: 5px; border-width: thin;" id="btn-tryout-GETapi-weapon" onclick="tryItOut('GETapi-weapon');">Try it out ⚡</button>
    <button type="button" style="background-color: #c97a7e; padding: 5px 10px; border-radius: 5px; border-width: thin;" id="btn-canceltryout-GETapi-weapon" onclick="cancelTryOut('GETapi-weapon');" hidden>Cancel</button>&nbsp;&nbsp;
    <button type="submit" style="background-color: #6ac174; padding: 5px 10px; border-radius: 5px; border-width: thin;" id="btn-executetryout-GETapi-weapon" hidden>Send Request 💥</button>
    </h3>
<p>
<small class="badge badge-green">GET</small>
 <b><code>api/weapon</code></b>
</p>
<h4 class="fancy-heading-panel"><b>Query Parameters</b></h4>
<p>
<b><code>language</code></b>&nbsp;&nbsp;<small>string</small>     <i>optional</i> &nbsp;
<input type="text" name="language" data-endpoint="GETapi-weapon" data-component="query"  hidden>
<br>
The language for names and descriptions. Defaults to 'en'.
</p>
</form>


## api/weapon/{weapon}




> Example request:

```bash
curl -X GET \
    -G "http://localhost:8989/api/weapon/voluptas?language=quam" \
    -H "Content-Type: application/json" \
    -H "Accept: application/json"
```

```javascript
const url = new URL(
    "http://localhost:8989/api/weapon/voluptas"
);

let params = {
    "language": "quam",
};
Object.keys(params)
    .forEach(key => url.searchParams.append(key, params[key]));

let headers = {
    "Content-Type": "application/json",
    "Accept": "application/json",
};


fetch(url, {
    method: "GET",
    headers,
}).then(response => response.json());
```


> Example response (200):

```json
{
    "name": "Buster Sword I",
    "type": "great-sword",
    "rarity": 1,
    "icon": "http:\/\/localhost:8989\/images\/equipment\/great-sword\/1.png",
    "category": null,
    "attack": 384,
    "true_attack": 80,
    "affinity": 0,
    "defense": 0,
    "elderseal": null,
    "slots": {
        "slot_1": 0,
        "slot_2": 0,
        "slot_3": 0
    },
    "elements": [],
    "sharpness": {
        "maxed": false,
        "values": {
            "red": 100,
            "orange": 50,
            "yellow": 80,
            "green": 20,
            "blue": 0,
            "white": 0,
            "purple": 0
        }
    },
    "skills": [],
    "crafting": {
        "is_craftable": true,
        "is_final": false,
        "crafting_cost": [
            {
                "id": 115,
                "name": "Iron Ore",
                "quantity": 1,
                "url": "http:\/\/localhost:8989\/api\/item\/115",
                "icon_url": "http:\/\/localhost:8989\/images\/items\/ore\/gray.png"
            }
        ],
        "upgrade_cost": [],
        "previous_weapon": false,
        "upgrades": [
            {
                "id": 2,
                "name": "Buster Sword II",
                "url": "http:\/\/localhost:8989\/api\/weapon\/2"
            }
        ]
    },
    "kinsect_bonus": false,
    "phial": false,
    "shelling": false,
    "coatings": false,
    "ammo": false,
    "melodies": false
}
```
<div id="execution-results-GETapi-weapon--weapon-" hidden>
    <blockquote>Received response<span id="execution-response-status-GETapi-weapon--weapon-"></span>:</blockquote>
    <pre class="json"><code id="execution-response-content-GETapi-weapon--weapon-"></code></pre>
</div>
<div id="execution-error-GETapi-weapon--weapon-" hidden>
    <blockquote>Request failed with error:</blockquote>
    <pre><code id="execution-error-message-GETapi-weapon--weapon-"></code></pre>
</div>
<form id="form-GETapi-weapon--weapon-" data-method="GET" data-path="api/weapon/{weapon}" data-authed="0" data-hasfiles="0" data-headers='{"Content-Type":"application\/json","Accept":"application\/json"}' onsubmit="event.preventDefault(); executeTryOut('GETapi-weapon--weapon-', this);">
<h3>
    Request&nbsp;&nbsp;&nbsp;
        <button type="button" style="background-color: #8fbcd4; padding: 5px 10px; border-radius: 5px; border-width: thin;" id="btn-tryout-GETapi-weapon--weapon-" onclick="tryItOut('GETapi-weapon--weapon-');">Try it out ⚡</button>
    <button type="button" style="background-color: #c97a7e; padding: 5px 10px; border-radius: 5px; border-width: thin;" id="btn-canceltryout-GETapi-weapon--weapon-" onclick="cancelTryOut('GETapi-weapon--weapon-');" hidden>Cancel</button>&nbsp;&nbsp;
    <button type="submit" style="background-color: #6ac174; padding: 5px 10px; border-radius: 5px; border-width: thin;" id="btn-executetryout-GETapi-weapon--weapon-" hidden>Send Request 💥</button>
    </h3>
<p>
<small class="badge badge-green">GET</small>
 <b><code>api/weapon/{weapon}</code></b>
</p>
<h4 class="fancy-heading-panel"><b>URL Parameters</b></h4>
<p>
<b><code>weapon</code></b>&nbsp;&nbsp;<small>string</small>  &nbsp;
<input type="text" name="weapon" data-endpoint="GETapi-weapon--weapon-" data-component="url" required  hidden>
<br>

</p>
<p>
<b><code>monster</code></b>&nbsp;&nbsp;<small>integer</small>  &nbsp;
<input type="number" name="monster" data-endpoint="GETapi-weapon--weapon-" data-component="url" required  hidden>
<br>
The ID of the weapon.
</p>
<h4 class="fancy-heading-panel"><b>Query Parameters</b></h4>
<p>
<b><code>language</code></b>&nbsp;&nbsp;<small>string</small>     <i>optional</i> &nbsp;
<input type="text" name="language" data-endpoint="GETapi-weapon--weapon-" data-component="query"  hidden>
<br>
The language for names and descriptions. Defaults to 'en'.
</p>
</form>



