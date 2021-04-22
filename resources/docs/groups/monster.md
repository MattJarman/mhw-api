# Monster


## api/monster




> Example request:

```bash
curl -X GET \
    -G "http://localhost:8989/api/monster?language=ab" \
    -H "Content-Type: application/json" \
    -H "Accept: application/json"
```

```javascript
const url = new URL(
    "http://localhost:8989/api/monster"
);

let params = {
    "language": "ab",
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
        "name": "Aptonoth",
        "size": "small",
        "species": null,
        "url": "http:\/\/localhost:8989\/api\/monster\/1"
    },
    {
        "id": 17,
        "name": "Great Jagras",
        "size": "large",
        "species": "Fanged Wyvern",
        "url": "http:\/\/localhost:8989\/api\/monster\/17"
    },
    {
        "id": 31,
        "name": "Rathalos",
        "size": "large",
        "species": "Flying Wyvern",
        "url": "http:\/\/localhost:8989\/api\/monster\/31"
    },
    {
        "id": 144,
        "name": "Alatreon",
        "size": "large",
        "species": "Elder Dragon",
        "url": "http:\/\/localhost:8989\/api\/monster\/144"
    }
]
```
<div id="execution-results-GETapi-monster" hidden>
    <blockquote>Received response<span id="execution-response-status-GETapi-monster"></span>:</blockquote>
    <pre class="json"><code id="execution-response-content-GETapi-monster"></code></pre>
</div>
<div id="execution-error-GETapi-monster" hidden>
    <blockquote>Request failed with error:</blockquote>
    <pre><code id="execution-error-message-GETapi-monster"></code></pre>
</div>
<form id="form-GETapi-monster" data-method="GET" data-path="api/monster" data-authed="0" data-hasfiles="0" data-headers='{"Content-Type":"application\/json","Accept":"application\/json"}' onsubmit="event.preventDefault(); executeTryOut('GETapi-monster', this);">
<h3>
    Request&nbsp;&nbsp;&nbsp;
        <button type="button" style="background-color: #8fbcd4; padding: 5px 10px; border-radius: 5px; border-width: thin;" id="btn-tryout-GETapi-monster" onclick="tryItOut('GETapi-monster');">Try it out ⚡</button>
    <button type="button" style="background-color: #c97a7e; padding: 5px 10px; border-radius: 5px; border-width: thin;" id="btn-canceltryout-GETapi-monster" onclick="cancelTryOut('GETapi-monster');" hidden>Cancel</button>&nbsp;&nbsp;
    <button type="submit" style="background-color: #6ac174; padding: 5px 10px; border-radius: 5px; border-width: thin;" id="btn-executetryout-GETapi-monster" hidden>Send Request 💥</button>
    </h3>
<p>
<small class="badge badge-green">GET</small>
 <b><code>api/monster</code></b>
</p>
<h4 class="fancy-heading-panel"><b>Query Parameters</b></h4>
<p>
<b><code>language</code></b>&nbsp;&nbsp;<small>string</small>     <i>optional</i> &nbsp;
<input type="text" name="language" data-endpoint="GETapi-monster" data-component="query"  hidden>
<br>
The language for names and descriptions. Defaults to 'en'.
</p>
</form>


## api/monster/{monster}




> Example request:

```bash
curl -X GET \
    -G "http://localhost:8989/api/monster/2?language=velit" \
    -H "Content-Type: application/json" \
    -H "Accept: application/json"
```

```javascript
const url = new URL(
    "http://localhost:8989/api/monster/2"
);

let params = {
    "language": "velit",
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
    "name": "Rathalos",
    "size": "large",
    "species": "Flying Wyvern",
    "icon": "http:\/\/localhost:8989\/images\/monster\/31.png",
    "colour": "#E04D54",
    "description": "The apex monster of the Ancient Forest, also known as the \"King of the Skies.\" A terrible wyvern that descends upon invaders, attacking with poison claws and fiery breath.",
    "traps": {
        "pitfall": true,
        "shock": true,
        "vine": true
    },
    "ailments": {
        "roar": true,
        "wind": true,
        "tremor": false,
        "defense_down": false,
        "fire_blight": true,
        "water_blight": false,
        "thunder_blight": false,
        "ice_blight": false,
        "dragon_blight": false,
        "blast_blight": false,
        "regional": false,
        "poison": true,
        "sleep": false,
        "paralysis": false,
        "bleed": false,
        "stun": false,
        "mud": false,
        "effluvia": false
    },
    "weaknesses": {
        "fire": 0,
        "water": 1,
        "ice": 1,
        "thunder": 2,
        "dragon": 3,
        "poison": 1,
        "sleep": 2,
        "paralysis": 2,
        "blast": 1,
        "stun": 2
    },
    "locations": [
        {
            "location": "Ancient Forest",
            "start_area": null,
            "move_area": "1,3,4,5,7,8,9,12,14,15,16",
            "rest_area": "16"
        },
        {
            "location": "Elder's Recess",
            "start_area": null,
            "move_area": "3,4,9",
            "rest_area": "4"
        }
    ],
    "rewards": {
        "lr": {
            "track": [
                {
                    "material": "Rathalos Scale",
                    "url": "http:\/\/localhost:8989\/api\/item\/339",
                    "icon_url": "http:\/\/localhost:8989\/images\/items\/scale\/red.png",
                    "stack": 1,
                    "percentage": 100
                }
            ],
            "carve_capture": [
                {
                    "material": "Rathalos Scale",
                    "url": "http:\/\/localhost:8989\/api\/item\/339",
                    "icon_url": "http:\/\/localhost:8989\/images\/items\/scale\/red.png",
                    "stack": 1,
                    "percentage": 35
                },
                {
                    "material": "Rathalos Shell",
                    "url": "http:\/\/localhost:8989\/api\/item\/340",
                    "icon_url": "http:\/\/localhost:8989\/images\/items\/carapace\/red.png",
                    "stack": 1,
                    "percentage": 26
                },
                {
                    "material": "Rathalos Webbing",
                    "url": "http:\/\/localhost:8989\/api\/item\/341",
                    "icon_url": "http:\/\/localhost:8989\/images\/items\/wing\/red.png",
                    "stack": 1,
                    "percentage": 20
                },
                {
                    "material": "Rathalos Marrow",
                    "url": "http:\/\/localhost:8989\/api\/item\/344",
                    "icon_url": "http:\/\/localhost:8989\/images\/items\/body\/red.png",
                    "stack": 1,
                    "percentage": 14
                },
                {
                    "material": "Rathalos Plate",
                    "url": "http:\/\/localhost:8989\/api\/item\/345",
                    "icon_url": "http:\/\/localhost:8989\/images\/items\/plate\/red.png",
                    "stack": 1,
                    "percentage": 5
                }
            ],
            "wound_head": [
                {
                    "material": "Rathalos Scale",
                    "url": "http:\/\/localhost:8989\/api\/item\/339",
                    "icon_url": "http:\/\/localhost:8989\/images\/items\/scale\/red.png",
                    "stack": 1,
                    "percentage": 66
                },
                {
                    "material": "Rathalos Shell",
                    "url": "http:\/\/localhost:8989\/api\/item\/340",
                    "icon_url": "http:\/\/localhost:8989\/images\/items\/carapace\/red.png",
                    "stack": 1,
                    "percentage": 30
                },
                {
                    "material": "Rathalos Plate",
                    "url": "http:\/\/localhost:8989\/api\/item\/345",
                    "icon_url": "http:\/\/localhost:8989\/images\/items\/plate\/red.png",
                    "stack": 1,
                    "percentage": 4
                }
            ],
            "wound_wings": [
                {
                    "material": "Rathalos Webbing",
                    "url": "http:\/\/localhost:8989\/api\/item\/341",
                    "icon_url": "http:\/\/localhost:8989\/images\/items\/wing\/red.png",
                    "stack": 1,
                    "percentage": 65
                },
                {
                    "material": "Rath Wingtalon",
                    "url": "http:\/\/localhost:8989\/api\/item\/343",
                    "icon_url": "http:\/\/localhost:8989\/images\/items\/fang\/red.png",
                    "stack": 1,
                    "percentage": 35
                }
            ],
            "wound_back": [
                {
                    "material": "Rathalos Shell",
                    "url": "http:\/\/localhost:8989\/api\/item\/340",
                    "icon_url": "http:\/\/localhost:8989\/images\/items\/carapace\/red.png",
                    "stack": 1,
                    "percentage": 69
                },
                {
                    "material": "Rathalos Marrow",
                    "url": "http:\/\/localhost:8989\/api\/item\/344",
                    "icon_url": "http:\/\/localhost:8989\/images\/items\/body\/red.png",
                    "stack": 1,
                    "percentage": 30
                },
                {
                    "material": "Rathalos Plate",
                    "url": "http:\/\/localhost:8989\/api\/item\/345",
                    "icon_url": "http:\/\/localhost:8989\/images\/items\/plate\/red.png",
                    "stack": 1,
                    "percentage": 1
                }
            ],
            "shiny_drop": [
                {
                    "material": "Rathalos Scale",
                    "url": "http:\/\/localhost:8989\/api\/item\/339",
                    "icon_url": "http:\/\/localhost:8989\/images\/items\/scale\/red.png",
                    "stack": 1,
                    "percentage": 50
                },
                {
                    "material": "Rathalos Shell",
                    "url": "http:\/\/localhost:8989\/api\/item\/340",
                    "icon_url": "http:\/\/localhost:8989\/images\/items\/carapace\/red.png",
                    "stack": 1,
                    "percentage": 28
                },
                {
                    "material": "Wyvern Tear",
                    "url": "http:\/\/localhost:8989\/api\/item\/606",
                    "icon_url": "http:\/\/localhost:8989\/images\/items\/body\/blue.png",
                    "stack": 1,
                    "percentage": 22
                }
            ],
            "tail_carve": [
                {
                    "material": "Rathalos Tail",
                    "url": "http:\/\/localhost:8989\/api\/item\/342",
                    "icon_url": "http:\/\/localhost:8989\/images\/items\/tail\/red.png",
                    "stack": 1,
                    "percentage": 70
                },
                {
                    "material": "Rathalos Scale",
                    "url": "http:\/\/localhost:8989\/api\/item\/339",
                    "icon_url": "http:\/\/localhost:8989\/images\/items\/scale\/red.png",
                    "stack": 1,
                    "percentage": 20
                },
                {
                    "material": "Rathalos Marrow",
                    "url": "http:\/\/localhost:8989\/api\/item\/344",
                    "icon_url": "http:\/\/localhost:8989\/images\/items\/body\/red.png",
                    "stack": 1,
                    "percentage": 7
                },
                {
                    "material": "Rathalos Plate",
                    "url": "http:\/\/localhost:8989\/api\/item\/345",
                    "icon_url": "http:\/\/localhost:8989\/images\/items\/plate\/red.png",
                    "stack": 1,
                    "percentage": 3
                }
            ],
            "palico_bonus": [
                {
                    "material": "Rathalos Scale",
                    "url": "http:\/\/localhost:8989\/api\/item\/339",
                    "icon_url": "http:\/\/localhost:8989\/images\/items\/scale\/red.png",
                    "stack": 1,
                    "percentage": 50
                },
                {
                    "material": "Rathalos Shell",
                    "url": "http:\/\/localhost:8989\/api\/item\/340",
                    "icon_url": "http:\/\/localhost:8989\/images\/items\/carapace\/red.png",
                    "stack": 1,
                    "percentage": 28
                },
                {
                    "material": "Wyvern Tear",
                    "url": "http:\/\/localhost:8989\/api\/item\/606",
                    "icon_url": "http:\/\/localhost:8989\/images\/items\/body\/blue.png",
                    "stack": 1,
                    "percentage": 22
                }
            ],
            "plunderblade": [
                {
                    "material": "Rathalos Scale",
                    "url": "http:\/\/localhost:8989\/api\/item\/339",
                    "icon_url": "http:\/\/localhost:8989\/images\/items\/scale\/red.png",
                    "stack": 1,
                    "percentage": 42
                },
                {
                    "material": "Rathalos Shell",
                    "url": "http:\/\/localhost:8989\/api\/item\/340",
                    "icon_url": "http:\/\/localhost:8989\/images\/items\/carapace\/red.png",
                    "stack": 1,
                    "percentage": 31
                },
                {
                    "material": "Rathalos Webbing",
                    "url": "http:\/\/localhost:8989\/api\/item\/341",
                    "icon_url": "http:\/\/localhost:8989\/images\/items\/wing\/red.png",
                    "stack": 1,
                    "percentage": 25
                },
                {
                    "material": "Rathalos Plate",
                    "url": "http:\/\/localhost:8989\/api\/item\/345",
                    "icon_url": "http:\/\/localhost:8989\/images\/items\/plate\/red.png",
                    "stack": 1,
                    "percentage": 2
                }
            ],
            "bandit_mantle": [
                {
                    "material": "Large Scale",
                    "url": "http:\/\/localhost:8989\/api\/item\/541",
                    "icon_url": "http:\/\/localhost:8989\/images\/items\/scale\/lightbeige.png",
                    "stack": 1,
                    "percentage": 70
                },
                {
                    "material": "Beautiful Scale",
                    "url": "http:\/\/localhost:8989\/api\/item\/542",
                    "icon_url": "http:\/\/localhost:8989\/images\/items\/scale\/white.png",
                    "stack": 1,
                    "percentage": 30
                }
            ],
            "hunt_bronze": [
                {
                    "material": "Rathalos Shell",
                    "url": "http:\/\/localhost:8989\/api\/item\/340",
                    "icon_url": "http:\/\/localhost:8989\/images\/items\/carapace\/red.png",
                    "stack": 1,
                    "percentage": 24
                },
                {
                    "material": "Rathalos Scale",
                    "url": "http:\/\/localhost:8989\/api\/item\/339",
                    "icon_url": "http:\/\/localhost:8989\/images\/items\/scale\/red.png",
                    "stack": 1,
                    "percentage": 19
                },
                {
                    "material": "Flame Sac",
                    "url": "http:\/\/localhost:8989\/api\/item\/163",
                    "icon_url": "http:\/\/localhost:8989\/images\/items\/sac\/red.png",
                    "stack": 1,
                    "percentage": 17
                },
                {
                    "material": "Rath Wingtalon",
                    "url": "http:\/\/localhost:8989\/api\/item\/343",
                    "icon_url": "http:\/\/localhost:8989\/images\/items\/fang\/red.png",
                    "stack": 2,
                    "percentage": 10
                },
                {
                    "material": "Monster Bone+",
                    "url": "http:\/\/localhost:8989\/api\/item\/149",
                    "icon_url": "http:\/\/localhost:8989\/images\/items\/bone\/beige.png",
                    "stack": 2,
                    "percentage": 10
                },
                {
                    "material": "Rathalos Webbing",
                    "url": "http:\/\/localhost:8989\/api\/item\/341",
                    "icon_url": "http:\/\/localhost:8989\/images\/items\/wing\/red.png",
                    "stack": 1,
                    "percentage": 9
                },
                {
                    "material": "Rathalos Tail",
                    "url": "http:\/\/localhost:8989\/api\/item\/342",
                    "icon_url": "http:\/\/localhost:8989\/images\/items\/tail\/red.png",
                    "stack": 1,
                    "percentage": 8
                },
                {
                    "material": "Rathalos Plate",
                    "url": "http:\/\/localhost:8989\/api\/item\/345",
                    "icon_url": "http:\/\/localhost:8989\/images\/items\/plate\/red.png",
                    "stack": 1,
                    "percentage": 3
                }
            ],
            "investigation_silver": [
                {
                    "material": "Rathalos Webbing",
                    "url": "http:\/\/localhost:8989\/api\/item\/341",
                    "icon_url": "http:\/\/localhost:8989\/images\/items\/wing\/red.png",
                    "stack": 1,
                    "percentage": 16
                },
                {
                    "material": "Rathalos Tail",
                    "url": "http:\/\/localhost:8989\/api\/item\/342",
                    "icon_url": "http:\/\/localhost:8989\/images\/items\/tail\/red.png",
                    "stack": 1,
                    "percentage": 16
                },
                {
                    "material": "Rath Wingtalon",
                    "url": "http:\/\/localhost:8989\/api\/item\/343",
                    "icon_url": "http:\/\/localhost:8989\/images\/items\/fang\/red.png",
                    "stack": 2,
                    "percentage": 15
                },
                {
                    "material": "Rathalos Marrow",
                    "url": "http:\/\/localhost:8989\/api\/item\/344",
                    "icon_url": "http:\/\/localhost:8989\/images\/items\/body\/red.png",
                    "stack": 1,
                    "percentage": 13
                },
                {
                    "material": "Rathalos Shell",
                    "url": "http:\/\/localhost:8989\/api\/item\/340",
                    "icon_url": "http:\/\/localhost:8989\/images\/items\/carapace\/red.png",
                    "stack": 2,
                    "percentage": 12
                },
                {
                    "material": "Rathalos Scale",
                    "url": "http:\/\/localhost:8989\/api\/item\/339",
                    "icon_url": "http:\/\/localhost:8989\/images\/items\/scale\/red.png",
                    "stack": 2,
                    "percentage": 10
                },
                {
                    "material": "Flame Sac",
                    "url": "http:\/\/localhost:8989\/api\/item\/163",
                    "icon_url": "http:\/\/localhost:8989\/images\/items\/sac\/red.png",
                    "stack": 2,
                    "percentage": 10
                },
                {
                    "material": "Rathalos Plate",
                    "url": "http:\/\/localhost:8989\/api\/item\/345",
                    "icon_url": "http:\/\/localhost:8989\/images\/items\/plate\/red.png",
                    "stack": 1,
                    "percentage": 8
                }
            ],
            "investigation_gold": [
                {
                    "material": "Rathalos Webbing",
                    "url": "http:\/\/localhost:8989\/api\/item\/341",
                    "icon_url": "http:\/\/localhost:8989\/images\/items\/wing\/red.png",
                    "stack": 1,
                    "percentage": 16
                },
                {
                    "material": "Rathalos Tail",
                    "url": "http:\/\/localhost:8989\/api\/item\/342",
                    "icon_url": "http:\/\/localhost:8989\/images\/items\/tail\/red.png",
                    "stack": 1,
                    "percentage": 16
                },
                {
                    "material": "Rathalos Plate",
                    "url": "http:\/\/localhost:8989\/api\/item\/345",
                    "icon_url": "http:\/\/localhost:8989\/images\/items\/plate\/red.png",
                    "stack": 1,
                    "percentage": 16
                },
                {
                    "material": "Rath Wingtalon",
                    "url": "http:\/\/localhost:8989\/api\/item\/343",
                    "icon_url": "http:\/\/localhost:8989\/images\/items\/fang\/red.png",
                    "stack": 2,
                    "percentage": 13
                },
                {
                    "material": "Rathalos Marrow",
                    "url": "http:\/\/localhost:8989\/api\/item\/344",
                    "icon_url": "http:\/\/localhost:8989\/images\/items\/body\/red.png",
                    "stack": 1,
                    "percentage": 13
                },
                {
                    "material": "Rathalos Shell",
                    "url": "http:\/\/localhost:8989\/api\/item\/340",
                    "icon_url": "http:\/\/localhost:8989\/images\/items\/carapace\/red.png",
                    "stack": 3,
                    "percentage": 10
                },
                {
                    "material": "Rathalos Scale",
                    "url": "http:\/\/localhost:8989\/api\/item\/339",
                    "icon_url": "http:\/\/localhost:8989\/images\/items\/scale\/red.png",
                    "stack": 3,
                    "percentage": 8
                },
                {
                    "material": "Flame Sac",
                    "url": "http:\/\/localhost:8989\/api\/item\/163",
                    "icon_url": "http:\/\/localhost:8989\/images\/items\/sac\/red.png",
                    "stack": 3,
                    "percentage": 8
                }
            ]
        },
        "hr": {
            "track": [
                {
                    "material": "Rathalos Scale+",
                    "url": "http:\/\/localhost:8989\/api\/item\/346",
                    "icon_url": "http:\/\/localhost:8989\/images\/items\/scale\/red.png",
                    "stack": 1,
                    "percentage": 100
                }
            ],
            "carve_capture": [
                {
                    "material": "Rathalos Scale+",
                    "url": "http:\/\/localhost:8989\/api\/item\/346",
                    "icon_url": "http:\/\/localhost:8989\/images\/items\/scale\/red.png",
                    "stack": 1,
                    "percentage": 34
                },
                {
                    "material": "Rathalos Carapace",
                    "url": "http:\/\/localhost:8989\/api\/item\/347",
                    "icon_url": "http:\/\/localhost:8989\/images\/items\/carapace\/red.png",
                    "stack": 1,
                    "percentage": 24
                },
                {
                    "material": "Rathalos Wing",
                    "url": "http:\/\/localhost:8989\/api\/item\/348",
                    "icon_url": "http:\/\/localhost:8989\/images\/items\/wing\/red.png",
                    "stack": 1,
                    "percentage": 20
                },
                {
                    "material": "Rathalos Medulla",
                    "url": "http:\/\/localhost:8989\/api\/item\/349",
                    "icon_url": "http:\/\/localhost:8989\/images\/items\/body\/red.png",
                    "stack": 1,
                    "percentage": 14
                },
                {
                    "material": "Rathalos Plate",
                    "url": "http:\/\/localhost:8989\/api\/item\/345",
                    "icon_url": "http:\/\/localhost:8989\/images\/items\/plate\/red.png",
                    "stack": 1,
                    "percentage": 7
                },
                {
                    "material": "Rathalos Ruby",
                    "url": "http:\/\/localhost:8989\/api\/item\/350",
                    "icon_url": "http:\/\/localhost:8989\/images\/items\/gem\/red.png",
                    "stack": 1,
                    "percentage": 1
                }
            ],
            "wound_head": [
                {
                    "material": "Rathalos Scale+",
                    "url": "http:\/\/localhost:8989\/api\/item\/346",
                    "icon_url": "http:\/\/localhost:8989\/images\/items\/scale\/red.png",
                    "stack": 1,
                    "percentage": 65
                },
                {
                    "material": "Rathalos Carapace",
                    "url": "http:\/\/localhost:8989\/api\/item\/347",
                    "icon_url": "http:\/\/localhost:8989\/images\/items\/carapace\/red.png",
                    "stack": 1,
                    "percentage": 30
                },
                {
                    "material": "Rathalos Plate",
                    "url": "http:\/\/localhost:8989\/api\/item\/345",
                    "icon_url": "http:\/\/localhost:8989\/images\/items\/plate\/red.png",
                    "stack": 1,
                    "percentage": 4
                },
                {
                    "material": "Rathalos Ruby",
                    "url": "http:\/\/localhost:8989\/api\/item\/350",
                    "icon_url": "http:\/\/localhost:8989\/images\/items\/gem\/red.png",
                    "stack": 1,
                    "percentage": 1
                }
            ],
            "wound_wings": [
                {
                    "material": "Rathalos Wing",
                    "url": "http:\/\/localhost:8989\/api\/item\/348",
                    "icon_url": "http:\/\/localhost:8989\/images\/items\/wing\/red.png",
                    "stack": 1,
                    "percentage": 65
                },
                {
                    "material": "Rath Wingtalon",
                    "url": "http:\/\/localhost:8989\/api\/item\/343",
                    "icon_url": "http:\/\/localhost:8989\/images\/items\/fang\/red.png",
                    "stack": 2,
                    "percentage": 35
                }
            ],
            "wound_back": [
                {
                    "material": "Rathalos Carapace",
                    "url": "http:\/\/localhost:8989\/api\/item\/347",
                    "icon_url": "http:\/\/localhost:8989\/images\/items\/carapace\/red.png",
                    "stack": 1,
                    "percentage": 69
                },
                {
                    "material": "Rathalos Medulla",
                    "url": "http:\/\/localhost:8989\/api\/item\/349",
                    "icon_url": "http:\/\/localhost:8989\/images\/items\/body\/red.png",
                    "stack": 1,
                    "percentage": 30
                },
                {
                    "material": "Rathalos Ruby",
                    "url": "http:\/\/localhost:8989\/api\/item\/350",
                    "icon_url": "http:\/\/localhost:8989\/images\/items\/gem\/red.png",
                    "stack": 1,
                    "percentage": 1
                }
            ],
            "shiny_drop": [
                {
                    "material": "Rathalos Scale+",
                    "url": "http:\/\/localhost:8989\/api\/item\/346",
                    "icon_url": "http:\/\/localhost:8989\/images\/items\/scale\/red.png",
                    "stack": 1,
                    "percentage": 50
                },
                {
                    "material": "Rathalos Carapace",
                    "url": "http:\/\/localhost:8989\/api\/item\/347",
                    "icon_url": "http:\/\/localhost:8989\/images\/items\/carapace\/red.png",
                    "stack": 1,
                    "percentage": 28
                },
                {
                    "material": "Wyvern Tear",
                    "url": "http:\/\/localhost:8989\/api\/item\/606",
                    "icon_url": "http:\/\/localhost:8989\/images\/items\/body\/blue.png",
                    "stack": 1,
                    "percentage": 22
                }
            ],
            "tail_carve": [
                {
                    "material": "Rathalos Tail",
                    "url": "http:\/\/localhost:8989\/api\/item\/342",
                    "icon_url": "http:\/\/localhost:8989\/images\/items\/tail\/red.png",
                    "stack": 1,
                    "percentage": 66
                },
                {
                    "material": "Rathalos Scale+",
                    "url": "http:\/\/localhost:8989\/api\/item\/346",
                    "icon_url": "http:\/\/localhost:8989\/images\/items\/scale\/red.png",
                    "stack": 1,
                    "percentage": 20
                },
                {
                    "material": "Rathalos Medulla",
                    "url": "http:\/\/localhost:8989\/api\/item\/349",
                    "icon_url": "http:\/\/localhost:8989\/images\/items\/body\/red.png",
                    "stack": 1,
                    "percentage": 7
                },
                {
                    "material": "Rathalos Plate",
                    "url": "http:\/\/localhost:8989\/api\/item\/345",
                    "icon_url": "http:\/\/localhost:8989\/images\/items\/plate\/red.png",
                    "stack": 1,
                    "percentage": 5
                },
                {
                    "material": "Rathalos Ruby",
                    "url": "http:\/\/localhost:8989\/api\/item\/350",
                    "icon_url": "http:\/\/localhost:8989\/images\/items\/gem\/red.png",
                    "stack": 1,
                    "percentage": 2
                }
            ],
            "palico_bonus": [
                {
                    "material": "Rathalos Scale+",
                    "url": "http:\/\/localhost:8989\/api\/item\/346",
                    "icon_url": "http:\/\/localhost:8989\/images\/items\/scale\/red.png",
                    "stack": 1,
                    "percentage": 50
                },
                {
                    "material": "Rathalos Carapace",
                    "url": "http:\/\/localhost:8989\/api\/item\/347",
                    "icon_url": "http:\/\/localhost:8989\/images\/items\/carapace\/red.png",
                    "stack": 1,
                    "percentage": 28
                },
                {
                    "material": "Wyvern Tear",
                    "url": "http:\/\/localhost:8989\/api\/item\/606",
                    "icon_url": "http:\/\/localhost:8989\/images\/items\/body\/blue.png",
                    "stack": 1,
                    "percentage": 22
                }
            ],
            "plunderblade": [
                {
                    "material": "Rathalos Carapace",
                    "url": "http:\/\/localhost:8989\/api\/item\/347",
                    "icon_url": "http:\/\/localhost:8989\/images\/items\/carapace\/red.png",
                    "stack": 1,
                    "percentage": 42
                },
                {
                    "material": "Rathalos Scale+",
                    "url": "http:\/\/localhost:8989\/api\/item\/346",
                    "icon_url": "http:\/\/localhost:8989\/images\/items\/scale\/red.png",
                    "stack": 1,
                    "percentage": 31
                },
                {
                    "material": "Rathalos Wing",
                    "url": "http:\/\/localhost:8989\/api\/item\/348",
                    "icon_url": "http:\/\/localhost:8989\/images\/items\/wing\/red.png",
                    "stack": 1,
                    "percentage": 26
                },
                {
                    "material": "Rathalos Ruby",
                    "url": "http:\/\/localhost:8989\/api\/item\/350",
                    "icon_url": "http:\/\/localhost:8989\/images\/items\/gem\/red.png",
                    "stack": 1,
                    "percentage": 1
                }
            ],
            "bandit_mantle": [
                {
                    "material": "Beautiful Scale",
                    "url": "http:\/\/localhost:8989\/api\/item\/542",
                    "icon_url": "http:\/\/localhost:8989\/images\/items\/scale\/white.png",
                    "stack": 1,
                    "percentage": 70
                },
                {
                    "material": "Lustrous Scale",
                    "url": "http:\/\/localhost:8989\/api\/item\/543",
                    "icon_url": "http:\/\/localhost:8989\/images\/items\/scale\/cyan.png",
                    "stack": 1,
                    "percentage": 30
                }
            ],
            "hunt_bronze": [
                {
                    "material": "Rathalos Carapace",
                    "url": "http:\/\/localhost:8989\/api\/item\/347",
                    "icon_url": "http:\/\/localhost:8989\/images\/items\/carapace\/red.png",
                    "stack": 1,
                    "percentage": 27
                },
                {
                    "material": "Rathalos Scale+",
                    "url": "http:\/\/localhost:8989\/api\/item\/346",
                    "icon_url": "http:\/\/localhost:8989\/images\/items\/scale\/red.png",
                    "stack": 1,
                    "percentage": 21
                },
                {
                    "material": "Inferno Sac",
                    "url": "http:\/\/localhost:8989\/api\/item\/164",
                    "icon_url": "http:\/\/localhost:8989\/images\/items\/sac\/red.png",
                    "stack": 1,
                    "percentage": 18
                },
                {
                    "material": "Rathalos Wing",
                    "url": "http:\/\/localhost:8989\/api\/item\/348",
                    "icon_url": "http:\/\/localhost:8989\/images\/items\/wing\/red.png",
                    "stack": 1,
                    "percentage": 12
                },
                {
                    "material": "Monster Hardbone",
                    "url": "http:\/\/localhost:8989\/api\/item\/151",
                    "icon_url": "http:\/\/localhost:8989\/images\/items\/bone\/red.png",
                    "stack": 2,
                    "percentage": 10
                },
                {
                    "material": "Rathalos Tail",
                    "url": "http:\/\/localhost:8989\/api\/item\/342",
                    "icon_url": "http:\/\/localhost:8989\/images\/items\/tail\/red.png",
                    "stack": 1,
                    "percentage": 9
                },
                {
                    "material": "Rathalos Plate",
                    "url": "http:\/\/localhost:8989\/api\/item\/345",
                    "icon_url": "http:\/\/localhost:8989\/images\/items\/plate\/red.png",
                    "stack": 1,
                    "percentage": 3
                }
            ],
            "investigation_silver": [
                {
                    "material": "Rathalos Wing",
                    "url": "http:\/\/localhost:8989\/api\/item\/348",
                    "icon_url": "http:\/\/localhost:8989\/images\/items\/wing\/red.png",
                    "stack": 1,
                    "percentage": 24
                },
                {
                    "material": "Rathalos Medulla",
                    "url": "http:\/\/localhost:8989\/api\/item\/349",
                    "icon_url": "http:\/\/localhost:8989\/images\/items\/body\/red.png",
                    "stack": 1,
                    "percentage": 20
                },
                {
                    "material": "Rathalos Carapace",
                    "url": "http:\/\/localhost:8989\/api\/item\/347",
                    "icon_url": "http:\/\/localhost:8989\/images\/items\/carapace\/red.png",
                    "stack": 2,
                    "percentage": 14
                },
                {
                    "material": "Inferno Sac",
                    "url": "http:\/\/localhost:8989\/api\/item\/164",
                    "icon_url": "http:\/\/localhost:8989\/images\/items\/sac\/red.png",
                    "stack": 2,
                    "percentage": 14
                },
                {
                    "material": "Rathalos Scale+",
                    "url": "http:\/\/localhost:8989\/api\/item\/346",
                    "icon_url": "http:\/\/localhost:8989\/images\/items\/scale\/red.png",
                    "stack": 2,
                    "percentage": 12
                },
                {
                    "material": "Rathalos Plate",
                    "url": "http:\/\/localhost:8989\/api\/item\/345",
                    "icon_url": "http:\/\/localhost:8989\/images\/items\/plate\/red.png",
                    "stack": 1,
                    "percentage": 10
                },
                {
                    "material": "Rathalos Ruby",
                    "url": "http:\/\/localhost:8989\/api\/item\/350",
                    "icon_url": "http:\/\/localhost:8989\/images\/items\/gem\/red.png",
                    "stack": 1,
                    "percentage": 6
                }
            ],
            "investigation_gold": [
                {
                    "material": "Rathalos Wing",
                    "url": "http:\/\/localhost:8989\/api\/item\/348",
                    "icon_url": "http:\/\/localhost:8989\/images\/items\/wing\/red.png",
                    "stack": 1,
                    "percentage": 23
                },
                {
                    "material": "Rathalos Medulla",
                    "url": "http:\/\/localhost:8989\/api\/item\/349",
                    "icon_url": "http:\/\/localhost:8989\/images\/items\/body\/red.png",
                    "stack": 1,
                    "percentage": 20
                },
                {
                    "material": "Rathalos Ruby",
                    "url": "http:\/\/localhost:8989\/api\/item\/350",
                    "icon_url": "http:\/\/localhost:8989\/images\/items\/gem\/red.png",
                    "stack": 1,
                    "percentage": 13
                },
                {
                    "material": "Rathalos Carapace",
                    "url": "http:\/\/localhost:8989\/api\/item\/347",
                    "icon_url": "http:\/\/localhost:8989\/images\/items\/carapace\/red.png",
                    "stack": 3,
                    "percentage": 12
                },
                {
                    "material": "Inferno Sac",
                    "url": "http:\/\/localhost:8989\/api\/item\/164",
                    "icon_url": "http:\/\/localhost:8989\/images\/items\/sac\/red.png",
                    "stack": 3,
                    "percentage": 12
                },
                {
                    "material": "Rathalos Scale+",
                    "url": "http:\/\/localhost:8989\/api\/item\/346",
                    "icon_url": "http:\/\/localhost:8989\/images\/items\/scale\/red.png",
                    "stack": 3,
                    "percentage": 10
                },
                {
                    "material": "Rathalos Plate",
                    "url": "http:\/\/localhost:8989\/api\/item\/345",
                    "icon_url": "http:\/\/localhost:8989\/images\/items\/plate\/red.png",
                    "stack": 1,
                    "percentage": 10
                }
            ],
            "investigation_purple": [
                {
                    "material": "Worn Feystone",
                    "url": "http:\/\/localhost:8989\/api\/item\/601",
                    "icon_url": "http:\/\/localhost:8989\/images\/items\/feystone\/beige.png",
                    "stack": 1,
                    "percentage": 35
                },
                {
                    "material": "Glowing Feystone",
                    "url": "http:\/\/localhost:8989\/api\/item\/600",
                    "icon_url": "http:\/\/localhost:8989\/images\/items\/feystone\/blue.png",
                    "stack": 1,
                    "percentage": 34
                },
                {
                    "material": "Warped Feystone",
                    "url": "http:\/\/localhost:8989\/api\/item\/602",
                    "icon_url": "http:\/\/localhost:8989\/images\/items\/feystone\/red.png",
                    "stack": 1,
                    "percentage": 26
                },
                {
                    "material": "Sullied Streamstone",
                    "url": "http:\/\/localhost:8989\/api\/item\/603",
                    "icon_url": "http:\/\/localhost:8989\/images\/items\/streamstone\/gray.png",
                    "stack": 1,
                    "percentage": 3
                },
                {
                    "material": "Shining Streamstone",
                    "url": "http:\/\/localhost:8989\/api\/item\/604",
                    "icon_url": "http:\/\/localhost:8989\/images\/items\/streamstone\/gold.png",
                    "stack": 1,
                    "percentage": 2
                }
            ]
        },
        "mr": {
            "track": [
                {
                    "material": "Rathalos Shard",
                    "url": "http:\/\/localhost:8989\/api\/item\/782",
                    "icon_url": "http:\/\/localhost:8989\/images\/items\/scale\/red.png",
                    "stack": 1,
                    "percentage": 100
                }
            ],
            "carve_capture": [
                {
                    "material": "Rathalos Shard",
                    "url": "http:\/\/localhost:8989\/api\/item\/782",
                    "icon_url": "http:\/\/localhost:8989\/images\/items\/scale\/red.png",
                    "stack": 1,
                    "percentage": 34
                },
                {
                    "material": "Rathalos Cortex",
                    "url": "http:\/\/localhost:8989\/api\/item\/840",
                    "icon_url": "http:\/\/localhost:8989\/images\/items\/carapace\/red.png",
                    "stack": 1,
                    "percentage": 24
                },
                {
                    "material": "Rathalos Fellwing",
                    "url": "http:\/\/localhost:8989\/api\/item\/841",
                    "icon_url": "http:\/\/localhost:8989\/images\/items\/wing\/red.png",
                    "stack": 1,
                    "percentage": 20
                },
                {
                    "material": "Rathalos Medulla",
                    "url": "http:\/\/localhost:8989\/api\/item\/349",
                    "icon_url": "http:\/\/localhost:8989\/images\/items\/body\/red.png",
                    "stack": 1,
                    "percentage": 14
                },
                {
                    "material": "Rathalos Ruby",
                    "url": "http:\/\/localhost:8989\/api\/item\/350",
                    "icon_url": "http:\/\/localhost:8989\/images\/items\/gem\/red.png",
                    "stack": 1,
                    "percentage": 7
                },
                {
                    "material": "Rathalos Mantle",
                    "url": "http:\/\/localhost:8989\/api\/item\/844",
                    "icon_url": null,
                    "stack": 1,
                    "percentage": 1
                }
            ],
            "wound_head": [
                {
                    "material": "Rathalos Cortex",
                    "url": "http:\/\/localhost:8989\/api\/item\/840",
                    "icon_url": "http:\/\/localhost:8989\/images\/items\/carapace\/red.png",
                    "stack": 1,
                    "percentage": 67
                },
                {
                    "material": "Rathalos Shard",
                    "url": "http:\/\/localhost:8989\/api\/item\/782",
                    "icon_url": "http:\/\/localhost:8989\/images\/items\/scale\/red.png",
                    "stack": 1,
                    "percentage": 27
                },
                {
                    "material": "Rathalos Ruby",
                    "url": "http:\/\/localhost:8989\/api\/item\/350",
                    "icon_url": "http:\/\/localhost:8989\/images\/items\/gem\/red.png",
                    "stack": 1,
                    "percentage": 5
                },
                {
                    "material": "Rathalos Mantle",
                    "url": "http:\/\/localhost:8989\/api\/item\/844",
                    "icon_url": null,
                    "stack": 1,
                    "percentage": 1
                }
            ],
            "wound_wings": [
                {
                    "material": "Rathalos Fellwing",
                    "url": "http:\/\/localhost:8989\/api\/item\/841",
                    "icon_url": "http:\/\/localhost:8989\/images\/items\/wing\/red.png",
                    "stack": 1,
                    "percentage": 65
                },
                {
                    "material": "Rath Wingtalon+",
                    "url": "http:\/\/localhost:8989\/api\/item\/843",
                    "icon_url": "http:\/\/localhost:8989\/images\/items\/fang\/red.png",
                    "stack": 1,
                    "percentage": 35
                }
            ],
            "wound_back": [
                {
                    "material": "Rathalos Cortex",
                    "url": "http:\/\/localhost:8989\/api\/item\/840",
                    "icon_url": "http:\/\/localhost:8989\/images\/items\/carapace\/red.png",
                    "stack": 1,
                    "percentage": 69
                },
                {
                    "material": "Rathalos Medulla",
                    "url": "http:\/\/localhost:8989\/api\/item\/349",
                    "icon_url": "http:\/\/localhost:8989\/images\/items\/body\/red.png",
                    "stack": 2,
                    "percentage": 30
                },
                {
                    "material": "Rathalos Mantle",
                    "url": "http:\/\/localhost:8989\/api\/item\/844",
                    "icon_url": null,
                    "stack": 1,
                    "percentage": 1
                }
            ],
            "shiny_drop": [
                {
                    "material": "Rathalos Shard",
                    "url": "http:\/\/localhost:8989\/api\/item\/782",
                    "icon_url": "http:\/\/localhost:8989\/images\/items\/scale\/red.png",
                    "stack": 1,
                    "percentage": 50
                },
                {
                    "material": "Rathalos Cortex",
                    "url": "http:\/\/localhost:8989\/api\/item\/840",
                    "icon_url": "http:\/\/localhost:8989\/images\/items\/carapace\/red.png",
                    "stack": 1,
                    "percentage": 28
                },
                {
                    "material": "Large Wyvern Tear",
                    "url": "http:\/\/localhost:8989\/api\/item\/607",
                    "icon_url": "http:\/\/localhost:8989\/images\/items\/body\/blue.png",
                    "stack": 1,
                    "percentage": 22
                }
            ],
            "tail_carve": [
                {
                    "material": "Rathalos Lash",
                    "url": "http:\/\/localhost:8989\/api\/item\/842",
                    "icon_url": "http:\/\/localhost:8989\/images\/items\/tail\/red.png",
                    "stack": 1,
                    "percentage": 66
                },
                {
                    "material": "Rathalos Shard",
                    "url": "http:\/\/localhost:8989\/api\/item\/782",
                    "icon_url": "http:\/\/localhost:8989\/images\/items\/scale\/red.png",
                    "stack": 1,
                    "percentage": 20
                },
                {
                    "material": "Rathalos Medulla",
                    "url": "http:\/\/localhost:8989\/api\/item\/349",
                    "icon_url": "http:\/\/localhost:8989\/images\/items\/body\/red.png",
                    "stack": 1,
                    "percentage": 7
                },
                {
                    "material": "Rathalos Ruby",
                    "url": "http:\/\/localhost:8989\/api\/item\/350",
                    "icon_url": "http:\/\/localhost:8989\/images\/items\/gem\/red.png",
                    "stack": 1,
                    "percentage": 5
                },
                {
                    "material": "Rathalos Mantle",
                    "url": "http:\/\/localhost:8989\/api\/item\/844",
                    "icon_url": null,
                    "stack": 1,
                    "percentage": 2
                }
            ],
            "palico_bonus": [
                {
                    "material": "Rathalos Shard",
                    "url": "http:\/\/localhost:8989\/api\/item\/782",
                    "icon_url": "http:\/\/localhost:8989\/images\/items\/scale\/red.png",
                    "stack": 1,
                    "percentage": 50
                },
                {
                    "material": "Rathalos Cortex",
                    "url": "http:\/\/localhost:8989\/api\/item\/840",
                    "icon_url": "http:\/\/localhost:8989\/images\/items\/carapace\/red.png",
                    "stack": 1,
                    "percentage": 28
                },
                {
                    "material": "Large Wyvern Tear",
                    "url": "http:\/\/localhost:8989\/api\/item\/607",
                    "icon_url": "http:\/\/localhost:8989\/images\/items\/body\/blue.png",
                    "stack": 1,
                    "percentage": 22
                }
            ],
            "plunderblade": [
                {
                    "material": "Rathalos Cortex",
                    "url": "http:\/\/localhost:8989\/api\/item\/840",
                    "icon_url": "http:\/\/localhost:8989\/images\/items\/carapace\/red.png",
                    "stack": 1,
                    "percentage": 42
                },
                {
                    "material": "Rathalos Shard",
                    "url": "http:\/\/localhost:8989\/api\/item\/782",
                    "icon_url": "http:\/\/localhost:8989\/images\/items\/scale\/red.png",
                    "stack": 1,
                    "percentage": 31
                },
                {
                    "material": "Rathalos Fellwing",
                    "url": "http:\/\/localhost:8989\/api\/item\/841",
                    "icon_url": "http:\/\/localhost:8989\/images\/items\/wing\/red.png",
                    "stack": 1,
                    "percentage": 26
                },
                {
                    "material": "Rathalos Mantle",
                    "url": "http:\/\/localhost:8989\/api\/item\/844",
                    "icon_url": null,
                    "stack": 1,
                    "percentage": 1
                }
            ],
            "bandit_mantle": [
                {
                    "material": "Lustrous Scale",
                    "url": "http:\/\/localhost:8989\/api\/item\/543",
                    "icon_url": "http:\/\/localhost:8989\/images\/items\/scale\/cyan.png",
                    "stack": 1,
                    "percentage": 70
                },
                {
                    "material": "Glimmering Scale",
                    "url": "http:\/\/localhost:8989\/api\/item\/544",
                    "icon_url": "http:\/\/localhost:8989\/images\/items\/scale\/gold.png",
                    "stack": 1,
                    "percentage": 30
                }
            ],
            "hunt_bronze": [
                {
                    "material": "Rathalos Cortex",
                    "url": "http:\/\/localhost:8989\/api\/item\/840",
                    "icon_url": "http:\/\/localhost:8989\/images\/items\/carapace\/red.png",
                    "stack": 1,
                    "percentage": 27
                },
                {
                    "material": "Rathalos Shard",
                    "url": "http:\/\/localhost:8989\/api\/item\/782",
                    "icon_url": "http:\/\/localhost:8989\/images\/items\/scale\/red.png",
                    "stack": 1,
                    "percentage": 21
                },
                {
                    "material": "Conflagrant Sac",
                    "url": "http:\/\/localhost:8989\/api\/item\/700",
                    "icon_url": "http:\/\/localhost:8989\/images\/items\/sac\/red.png",
                    "stack": 1,
                    "percentage": 18
                },
                {
                    "material": "Rathalos Fellwing",
                    "url": "http:\/\/localhost:8989\/api\/item\/841",
                    "icon_url": "http:\/\/localhost:8989\/images\/items\/wing\/red.png",
                    "stack": 1,
                    "percentage": 12
                },
                {
                    "material": "Rath Wingtalon+",
                    "url": "http:\/\/localhost:8989\/api\/item\/843",
                    "icon_url": "http:\/\/localhost:8989\/images\/items\/fang\/red.png",
                    "stack": 2,
                    "percentage": 10
                },
                {
                    "material": "Rathalos Lash",
                    "url": "http:\/\/localhost:8989\/api\/item\/842",
                    "icon_url": "http:\/\/localhost:8989\/images\/items\/tail\/red.png",
                    "stack": 1,
                    "percentage": 9
                },
                {
                    "material": "Rathalos Ruby",
                    "url": "http:\/\/localhost:8989\/api\/item\/350",
                    "icon_url": "http:\/\/localhost:8989\/images\/items\/gem\/red.png",
                    "stack": 1,
                    "percentage": 3
                }
            ],
            "investigation_silver": [
                {
                    "material": "Rathalos Cortex",
                    "url": "http:\/\/localhost:8989\/api\/item\/840",
                    "icon_url": "http:\/\/localhost:8989\/images\/items\/carapace\/red.png",
                    "stack": 2,
                    "percentage": 17
                },
                {
                    "material": "Rathalos Shard",
                    "url": "http:\/\/localhost:8989\/api\/item\/782",
                    "icon_url": "http:\/\/localhost:8989\/images\/items\/scale\/red.png",
                    "stack": 2,
                    "percentage": 15
                },
                {
                    "material": "Rathalos Fellwing",
                    "url": "http:\/\/localhost:8989\/api\/item\/841",
                    "icon_url": "http:\/\/localhost:8989\/images\/items\/wing\/red.png",
                    "stack": 1,
                    "percentage": 15
                },
                {
                    "material": "Conflagrant Sac",
                    "url": "http:\/\/localhost:8989\/api\/item\/700",
                    "icon_url": "http:\/\/localhost:8989\/images\/items\/sac\/red.png",
                    "stack": 2,
                    "percentage": 14
                },
                {
                    "material": "Rathalos Lash",
                    "url": "http:\/\/localhost:8989\/api\/item\/842",
                    "icon_url": "http:\/\/localhost:8989\/images\/items\/tail\/red.png",
                    "stack": 1,
                    "percentage": 13
                },
                {
                    "material": "Rath Wingtalon+",
                    "url": "http:\/\/localhost:8989\/api\/item\/843",
                    "icon_url": "http:\/\/localhost:8989\/images\/items\/fang\/red.png",
                    "stack": 2,
                    "percentage": 10
                },
                {
                    "material": "Rathalos Ruby",
                    "url": "http:\/\/localhost:8989\/api\/item\/350",
                    "icon_url": "http:\/\/localhost:8989\/images\/items\/gem\/red.png",
                    "stack": 1,
                    "percentage": 10
                },
                {
                    "material": "Rathalos Mantle",
                    "url": "http:\/\/localhost:8989\/api\/item\/844",
                    "icon_url": null,
                    "stack": 1,
                    "percentage": 6
                }
            ],
            "investigation_gold": [
                {
                    "material": "Rathalos Fellwing",
                    "url": "http:\/\/localhost:8989\/api\/item\/841",
                    "icon_url": "http:\/\/localhost:8989\/images\/items\/wing\/red.png",
                    "stack": 1,
                    "percentage": 17
                },
                {
                    "material": "Rathalos Lash",
                    "url": "http:\/\/localhost:8989\/api\/item\/842",
                    "icon_url": "http:\/\/localhost:8989\/images\/items\/tail\/red.png",
                    "stack": 1,
                    "percentage": 16
                },
                {
                    "material": "Rathalos Mantle",
                    "url": "http:\/\/localhost:8989\/api\/item\/844",
                    "icon_url": null,
                    "stack": 1,
                    "percentage": 13
                },
                {
                    "material": "Rathalos Cortex",
                    "url": "http:\/\/localhost:8989\/api\/item\/840",
                    "icon_url": "http:\/\/localhost:8989\/images\/items\/carapace\/red.png",
                    "stack": 3,
                    "percentage": 12
                },
                {
                    "material": "Conflagrant Sac",
                    "url": "http:\/\/localhost:8989\/api\/item\/700",
                    "icon_url": "http:\/\/localhost:8989\/images\/items\/sac\/red.png",
                    "stack": 3,
                    "percentage": 12
                },
                {
                    "material": "Rathalos Shard",
                    "url": "http:\/\/localhost:8989\/api\/item\/782",
                    "icon_url": "http:\/\/localhost:8989\/images\/items\/scale\/red.png",
                    "stack": 3,
                    "percentage": 10
                },
                {
                    "material": "Rath Wingtalon+",
                    "url": "http:\/\/localhost:8989\/api\/item\/843",
                    "icon_url": "http:\/\/localhost:8989\/images\/items\/fang\/red.png",
                    "stack": 2,
                    "percentage": 10
                },
                {
                    "material": "Rathalos Ruby",
                    "url": "http:\/\/localhost:8989\/api\/item\/350",
                    "icon_url": "http:\/\/localhost:8989\/images\/items\/gem\/red.png",
                    "stack": 1,
                    "percentage": 10
                }
            ],
            "investigation_purple": [
                {
                    "material": "Carved Feystone",
                    "url": "http:\/\/localhost:8989\/api\/item\/1067",
                    "icon_url": "http:\/\/localhost:8989\/images\/items\/feystone\/green.png",
                    "stack": 1,
                    "percentage": 60
                },
                {
                    "material": "Ancient Feystone",
                    "url": "http:\/\/localhost:8989\/api\/item\/1066",
                    "icon_url": "http:\/\/localhost:8989\/images\/items\/feystone\/violet.png",
                    "stack": 1,
                    "percentage": 30
                },
                {
                    "material": "Sealed Feystone",
                    "url": "http:\/\/localhost:8989\/api\/item\/1068",
                    "icon_url": "http:\/\/localhost:8989\/images\/items\/feystone\/gold.png",
                    "stack": 1,
                    "percentage": 10
                }
            ],
            "guiding_lands_low": [
                {
                    "material": "Heavy Dragonvein Bone",
                    "url": "http:\/\/localhost:8989\/api\/item\/1022",
                    "icon_url": "http:\/\/localhost:8989\/images\/items\/bone\/gray.png",
                    "stack": 1,
                    "percentage": 63
                },
                {
                    "material": "King's Scale",
                    "url": "http:\/\/localhost:8989\/api\/item\/1132",
                    "icon_url": "http:\/\/localhost:8989\/images\/items\/scale\/red.png",
                    "stack": 1,
                    "percentage": 37
                }
            ],
            "guiding_lands_mid": [
                {
                    "material": "King's Scale",
                    "url": "http:\/\/localhost:8989\/api\/item\/1132",
                    "icon_url": "http:\/\/localhost:8989\/images\/items\/scale\/red.png",
                    "stack": 1,
                    "percentage": 63
                },
                {
                    "material": "Heavy Dragonvein Bone",
                    "url": "http:\/\/localhost:8989\/api\/item\/1022",
                    "icon_url": "http:\/\/localhost:8989\/images\/items\/bone\/gray.png",
                    "stack": 1,
                    "percentage": 37
                }
            ],
            "guiding_lands_high": [
                {
                    "material": "King's Scale",
                    "url": "http:\/\/localhost:8989\/api\/item\/1132",
                    "icon_url": "http:\/\/localhost:8989\/images\/items\/scale\/red.png",
                    "stack": 1,
                    "percentage": 100
                }
            ],
            "guiding_lands_tempered": [
                {
                    "material": "Tempered Red Scale",
                    "url": "http:\/\/localhost:8989\/api\/item\/1057",
                    "icon_url": "http:\/\/localhost:8989\/images\/items\/scale\/red.png",
                    "stack": 1,
                    "percentage": 61
                },
                {
                    "material": "Spiritvein Solidbone",
                    "url": "http:\/\/localhost:8989\/api\/item\/1047",
                    "icon_url": "http:\/\/localhost:8989\/images\/items\/bone\/beige.png",
                    "stack": 1,
                    "percentage": 30
                },
                {
                    "material": "Spiritvein Gem",
                    "url": "http:\/\/localhost:8989\/api\/item\/1091",
                    "icon_url": "http:\/\/localhost:8989\/images\/items\/streamstone\/white.png",
                    "stack": 1,
                    "percentage": 9
                }
            ]
        }
    },
    "breaks": {
        "head": [
            {
                "flinch": 240,
                "wound": 480,
                "sever": 0,
                "extract": "red"
            }
        ],
        "body": [
            {
                "flinch": 300,
                "wound": 300,
                "sever": 0,
                "extract": "orange"
            }
        ],
        "left_wing": [
            {
                "flinch": 220,
                "wound": 220,
                "sever": 0,
                "extract": "white"
            }
        ],
        "right_wing": [
            {
                "flinch": 220,
                "wound": 220,
                "sever": 0,
                "extract": "white"
            }
        ],
        "left_leg": [
            {
                "flinch": 190,
                "wound": 0,
                "sever": 0,
                "extract": "orange"
            }
        ],
        "right_leg": [
            {
                "flinch": 190,
                "wound": 0,
                "sever": 0,
                "extract": "orange"
            }
        ],
        "tail": [
            {
                "flinch": 200,
                "wound": 0,
                "sever": 200,
                "extract": "green"
            }
        ]
    },
    "hit_zones": {
        "head": {
            "cut": 65,
            "impact": 70,
            "shot": 60,
            "fire": 0,
            "water": 15,
            "ice": 15,
            "thunder": 20,
            "dragon": 30,
            "ko": 100
        },
        "neck": {
            "cut": 35,
            "impact": 40,
            "shot": 30,
            "fire": 0,
            "water": 5,
            "ice": 5,
            "thunder": 10,
            "dragon": 20,
            "ko": 0
        },
        "body": {
            "cut": 25,
            "impact": 25,
            "shot": 20,
            "fire": 0,
            "water": 5,
            "ice": 5,
            "thunder": 10,
            "dragon": 20,
            "ko": 0
        },
        "back": {
            "cut": 25,
            "impact": 25,
            "shot": 20,
            "fire": 0,
            "water": 5,
            "ice": 5,
            "thunder": 10,
            "dragon": 20,
            "ko": 0
        },
        "left_wing": {
            "cut": 50,
            "impact": 45,
            "shot": 40,
            "fire": 0,
            "water": 10,
            "ice": 10,
            "thunder": 15,
            "dragon": 25,
            "ko": 0
        },
        "right_wing": {
            "cut": 50,
            "impact": 45,
            "shot": 40,
            "fire": 0,
            "water": 10,
            "ice": 10,
            "thunder": 15,
            "dragon": 25,
            "ko": 0
        },
        "left_leg": {
            "cut": 35,
            "impact": 35,
            "shot": 30,
            "fire": 0,
            "water": 0,
            "ice": 0,
            "thunder": 5,
            "dragon": 15,
            "ko": 0
        },
        "right_leg": {
            "cut": 35,
            "impact": 35,
            "shot": 30,
            "fire": 0,
            "water": 0,
            "ice": 0,
            "thunder": 5,
            "dragon": 15,
            "ko": 0
        },
        "tail": {
            "cut": 45,
            "impact": 40,
            "shot": 35,
            "fire": 0,
            "water": 5,
            "ice": 5,
            "thunder": 10,
            "dragon": 20,
            "ko": 0
        }
    }
}
```
<div id="execution-results-GETapi-monster--monster-" hidden>
    <blockquote>Received response<span id="execution-response-status-GETapi-monster--monster-"></span>:</blockquote>
    <pre class="json"><code id="execution-response-content-GETapi-monster--monster-"></code></pre>
</div>
<div id="execution-error-GETapi-monster--monster-" hidden>
    <blockquote>Request failed with error:</blockquote>
    <pre><code id="execution-error-message-GETapi-monster--monster-"></code></pre>
</div>
<form id="form-GETapi-monster--monster-" data-method="GET" data-path="api/monster/{monster}" data-authed="0" data-hasfiles="0" data-headers='{"Content-Type":"application\/json","Accept":"application\/json"}' onsubmit="event.preventDefault(); executeTryOut('GETapi-monster--monster-', this);">
<h3>
    Request&nbsp;&nbsp;&nbsp;
        <button type="button" style="background-color: #8fbcd4; padding: 5px 10px; border-radius: 5px; border-width: thin;" id="btn-tryout-GETapi-monster--monster-" onclick="tryItOut('GETapi-monster--monster-');">Try it out ⚡</button>
    <button type="button" style="background-color: #c97a7e; padding: 5px 10px; border-radius: 5px; border-width: thin;" id="btn-canceltryout-GETapi-monster--monster-" onclick="cancelTryOut('GETapi-monster--monster-');" hidden>Cancel</button>&nbsp;&nbsp;
    <button type="submit" style="background-color: #6ac174; padding: 5px 10px; border-radius: 5px; border-width: thin;" id="btn-executetryout-GETapi-monster--monster-" hidden>Send Request 💥</button>
    </h3>
<p>
<small class="badge badge-green">GET</small>
 <b><code>api/monster/{monster}</code></b>
</p>
<h4 class="fancy-heading-panel"><b>URL Parameters</b></h4>
<p>
<b><code>monster</code></b>&nbsp;&nbsp;<small>integer</small>  &nbsp;
<input type="number" name="monster" data-endpoint="GETapi-monster--monster-" data-component="url" required  hidden>
<br>
The ID of the monster.
</p>
<h4 class="fancy-heading-panel"><b>Query Parameters</b></h4>
<p>
<b><code>language</code></b>&nbsp;&nbsp;<small>string</small>     <i>optional</i> &nbsp;
<input type="text" name="language" data-endpoint="GETapi-monster--monster-" data-component="query"  hidden>
<br>
The language for names and descriptions. Defaults to 'en'.
</p>
</form>



