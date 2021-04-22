# Item


## api/item




> Example request:

```bash
curl -X GET \
    -G "http://localhost:8989/api/item?language=quo" \
    -H "Content-Type: application/json" \
    -H "Accept: application/json"
```

```javascript
const url = new URL(
    "http://localhost:8989/api/item"
);

let params = {
    "language": "quo",
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
        "name": "Potion",
        "category": "item",
        "url": "http:\/\/localhost:8989\/api\/item\/1"
    },
    {
        "id": 2,
        "name": "Mega Potion",
        "category": "item",
        "url": "http:\/\/localhost:8989\/api\/item\/2"
    },
    {
        "id": 3,
        "name": "Max Potion",
        "category": "item",
        "url": "http:\/\/localhost:8989\/api\/item\/3"
    },
    {
        "id": 4,
        "name": "Ancient Potion",
        "category": "item",
        "url": "http:\/\/localhost:8989\/api\/item\/4"
    },
    {
        "id": 5,
        "name": "Antidote",
        "category": "item",
        "url": "http:\/\/localhost:8989\/api\/item\/5"
    },
    {
        "id": 6,
        "name": "Herbal Medicine",
        "category": "item",
        "url": "http:\/\/localhost:8989\/api\/item\/6"
    },
    {
        "id": 7,
        "name": "Nulberry",
        "category": "item",
        "url": "http:\/\/localhost:8989\/api\/item\/7"
    },
    {
        "id": 8,
        "name": "Energy Drink",
        "category": "item",
        "url": "http:\/\/localhost:8989\/api\/item\/8"
    },
    {
        "id": 9,
        "name": "Ration",
        "category": "item",
        "url": "http:\/\/localhost:8989\/api\/item\/9"
    },
    {
        "id": 10,
        "name": "Rare Steak",
        "category": "item",
        "url": "http:\/\/localhost:8989\/api\/item\/10"
    }
]
```
<div id="execution-results-GETapi-item" hidden>
    <blockquote>Received response<span id="execution-response-status-GETapi-item"></span>:</blockquote>
    <pre class="json"><code id="execution-response-content-GETapi-item"></code></pre>
</div>
<div id="execution-error-GETapi-item" hidden>
    <blockquote>Request failed with error:</blockquote>
    <pre><code id="execution-error-message-GETapi-item"></code></pre>
</div>
<form id="form-GETapi-item" data-method="GET" data-path="api/item" data-authed="0" data-hasfiles="0" data-headers='{"Content-Type":"application\/json","Accept":"application\/json"}' onsubmit="event.preventDefault(); executeTryOut('GETapi-item', this);">
<h3>
    Request&nbsp;&nbsp;&nbsp;
        <button type="button" style="background-color: #8fbcd4; padding: 5px 10px; border-radius: 5px; border-width: thin;" id="btn-tryout-GETapi-item" onclick="tryItOut('GETapi-item');">Try it out ⚡</button>
    <button type="button" style="background-color: #c97a7e; padding: 5px 10px; border-radius: 5px; border-width: thin;" id="btn-canceltryout-GETapi-item" onclick="cancelTryOut('GETapi-item');" hidden>Cancel</button>&nbsp;&nbsp;
    <button type="submit" style="background-color: #6ac174; padding: 5px 10px; border-radius: 5px; border-width: thin;" id="btn-executetryout-GETapi-item" hidden>Send Request 💥</button>
    </h3>
<p>
<small class="badge badge-green">GET</small>
 <b><code>api/item</code></b>
</p>
<h4 class="fancy-heading-panel"><b>Query Parameters</b></h4>
<p>
<b><code>language</code></b>&nbsp;&nbsp;<small>string</small>     <i>optional</i> &nbsp;
<input type="text" name="language" data-endpoint="GETapi-item" data-component="query"  hidden>
<br>
The language for names and descriptions. Defaults to 'en'.
</p>
</form>


## api/item/{item}




> Example request:

```bash
curl -X GET \
    -G "http://localhost:8989/api/item/16?language=illo" \
    -H "Content-Type: application/json" \
    -H "Accept: application/json"
```

```javascript
const url = new URL(
    "http://localhost:8989/api/item/16"
);

let params = {
    "language": "illo",
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
    "name": "Potion",
    "icon": "http:\/\/localhost:8989\/images\/items\/liquid\/green.png",
    "category": "item",
    "sub_category": null,
    "rarity": 1,
    "prices": {
        "buy": 66,
        "sell": 8
    },
    "carry_limit": 10,
    "research_points": 0,
    "recipes": [
        {
            "first_ingredient": {
                "name": "Herb",
                "url": "http:\/\/localhost:8989\/api\/item\/32"
            },
            "second_ingredient": null
        }
    ]
}
```
<div id="execution-results-GETapi-item--item-" hidden>
    <blockquote>Received response<span id="execution-response-status-GETapi-item--item-"></span>:</blockquote>
    <pre class="json"><code id="execution-response-content-GETapi-item--item-"></code></pre>
</div>
<div id="execution-error-GETapi-item--item-" hidden>
    <blockquote>Request failed with error:</blockquote>
    <pre><code id="execution-error-message-GETapi-item--item-"></code></pre>
</div>
<form id="form-GETapi-item--item-" data-method="GET" data-path="api/item/{item}" data-authed="0" data-hasfiles="0" data-headers='{"Content-Type":"application\/json","Accept":"application\/json"}' onsubmit="event.preventDefault(); executeTryOut('GETapi-item--item-', this);">
<h3>
    Request&nbsp;&nbsp;&nbsp;
        <button type="button" style="background-color: #8fbcd4; padding: 5px 10px; border-radius: 5px; border-width: thin;" id="btn-tryout-GETapi-item--item-" onclick="tryItOut('GETapi-item--item-');">Try it out ⚡</button>
    <button type="button" style="background-color: #c97a7e; padding: 5px 10px; border-radius: 5px; border-width: thin;" id="btn-canceltryout-GETapi-item--item-" onclick="cancelTryOut('GETapi-item--item-');" hidden>Cancel</button>&nbsp;&nbsp;
    <button type="submit" style="background-color: #6ac174; padding: 5px 10px; border-radius: 5px; border-width: thin;" id="btn-executetryout-GETapi-item--item-" hidden>Send Request 💥</button>
    </h3>
<p>
<small class="badge badge-green">GET</small>
 <b><code>api/item/{item}</code></b>
</p>
<h4 class="fancy-heading-panel"><b>URL Parameters</b></h4>
<p>
<b><code>item</code></b>&nbsp;&nbsp;<small>integer</small>  &nbsp;
<input type="number" name="item" data-endpoint="GETapi-item--item-" data-component="url" required  hidden>
<br>
The ID of the item.
</p>
<h4 class="fancy-heading-panel"><b>Query Parameters</b></h4>
<p>
<b><code>language</code></b>&nbsp;&nbsp;<small>string</small>     <i>optional</i> &nbsp;
<input type="text" name="language" data-endpoint="GETapi-item--item-" data-component="query"  hidden>
<br>
The language for names and descriptions. Defaults to 'en'.
</p>
</form>



