# Removed Providers

Providers are removed when their oembed endpoint stops working for good: the
site shut down, the endpoint returns errors on valid urls or the service no
longer supports oembed.

If you reference any of these classes directly, for example when registering
providers on a `CustomProviderCollection` or disabling them on the
`DefaultProviderCollection`, remove them before upgrading. Otherwise PHP will
not be able to find the class.

All classes live in the `Embera\Provider` namespace.

## Unreleased

| Provider | Removed on | Reason |
|----------|------------|--------|
| Animoto | 2026-11-17 | oembed endpoint returns 404 |
| AnnieMusic | 2026-11-17 | oembed endpoint returns 404 |
| Archivos | 2026-11-17 | Host is unreachable |
| AudioClip | 2026-11-17 | oembed endpoint returns 404 |
| Biqnetwork | 2026-11-17 | oembed endpoint returns 404 |
| Blogcast | 2026-11-17 | Host is unreachable |
| Chroco | 2026-11-17 | oembed endpoint returns 404 |
| Datawrapper | 2026-11-17 | oembed endpoint returns 404 |
| Fader | 2026-11-17 | Host is unreachable |
| GloriaTV | 2026-11-17 | oembed endpoint returns 404 |
| Hash | 2026-11-17 | oembed endpoint returns 404 |
| Hopvue | 2026-11-17 | Host is unreachable |
| Infoveave | 2026-11-17 | oembed endpoint returns 404 |
| Jovian | 2026-11-17 | oembed endpoint returns 404 |
| Kit | 2026-11-17 | Host is unreachable |
| MermaidInk | 2026-11-17 | oembed endpoint returns 404 |
| NFTndx | 2026-11-17 | oembed endpoint returns 404 |
| PeerTubeTV | 2026-11-17 | oembed endpoint returns 404 |
| Piggy | 2026-11-17 | Host is unreachable |
| Playbuzz | 2026-11-17 | Host is unreachable |
| Quartr | 2026-11-17 | oembed endpoint returns 404 |
| RadioPublic | 2026-11-17 | Host is unreachable |
| Replit | 2026-11-17 | oembed endpoint returns 404 |
| ReverbNation | 2026-11-17 | oembed endpoint returns 404 |
| Screencast | 2026-11-17 | oembed endpoint returns 410 |
| SmashNotes | 2026-11-17 | oembed endpoint returns 404 |
| UstreamTV | 2026-11-17 | oembed endpoint returns 404 |
| VoxSnap | 2026-11-17 | oembed endpoint returns 404 |
| Webcrumbs | 2026-11-17 | Host is unreachable |

## 2.0.42

| Provider | Removed on | Reason |
|----------|------------|--------|
| Chainflix | 2025-01-03 | Website is no longer available |
| Eyrie | 2025-01-04 | Endpoint is not responding |
| GeographDE | 2025-01-04 | Site redirects to the other Geograph providers |
| MicrosoftStream | 2025-01-04 | Url no longer exists |
| Naro | 2025-01-04 | Site is no longer online |
| Shopshare | 2025-01-04 | Site is down |
| Smeme | 2025-01-04 | Site is down |
| TwentyThreeHq | 2025-01-04 | oembed endpoint returns 404 |
| UniversityCambridgeMap | 2025-01-04 | App changed and oembed stopped working |

## 2.0.35

| Provider | Removed on | Reason |
|----------|------------|--------|
| AmCharts | 2023-11-09 | API no longer works or requires authentication |
| Avocode | 2023-11-08 | Service was sunset on 2023-10-01 |
| Backtracks | 2023-11-08 | Service no longer exists |
| Byzart | 2023-11-09 | No longer provides an oembed endpoint |
| Chirbit | 2023-11-09 | Endpoint hangs since 2023-01-20 |
| CodePen | 2023-11-09 | Embeds are behind crawler protection, always returns 403 |
| EduMedia | 2023-11-09 | oembed endpoint is no longer available |
| EnystreMusic | 2023-07-08 | Site closed on 2023-07-20 |
| Gfycat | 2023-11-08 | Service shut down |
| IMenuPro | 2023-11-09 | Stopped working on 2022-11-09 |
| Minesweeper | 2023-11-08 | No longer provides an oembed endpoint |
| NoPaste | 2023-11-08 | Service no longer exists |
| OnSizzle | 2023-11-09 | Stopped working |
| Padlet | 2023-11-09 | Blocks crawlers since 2022-11-20 |
| Saooti | 2023-11-09 | No longer supports oembed |
| Smrthi | 2023-11-08 | No longer provides an oembed endpoint |
| Subscribi | 2023-11-08 | Stopped working |
| Veer | 2023-11-08 | No longer provides an oembed endpoint |
| Vlive | 2023-11-09 | Merged into Weverse, no equivalent oembed endpoint |
| Waltrack | 2023-11-09 | Service no longer exists |

## 2.0.28

| Provider | Removed on | Reason |
|----------|------------|--------|
| DotSUB | 2022-11-09 | No longer supports oembed |
| Incredible | 2022-11-09 | Product in alpha state, urls are broken |
| Inoreader | 2022-11-10 | Endpoint is offline |
| Kmdr | 2022-11-10 | Site has been down for months |
| LillePod | 2022-11-09 | oembed API shut down |
| MessesInfo | 2022-11-10 | Endpoint is down |
| Roomshare | 2022-11-09 | oembed endpoint is no longer supported |
| Typecast | 2022-11-09 | Backend service no longer exists |
| ZnipeTV | 2022-11-10 | Site has been inactive for a long time |

## 2.0.25

| Provider | Removed on | Reason |
|----------|------------|--------|
| Minerva | 2022-04-06 | Endpoint stopped working |
| Typlog | 2022-04-06 | Endpoint stopped working |

## 2.0.23

| Provider | Removed on | Reason |
|----------|------------|--------|
| CocoCorp | 2022-01-31 | Stopped working |
| Kidoju | 2022-01-31 | Stopped working |
| ModeloIO | 2021-10-12 | No longer provides an oembed endpoint |
| Oz | 2022-01-31 | Stopped working |
| Pixdor | 2021-10-12 | No reason recorded |
| PolariShare | 2021-10-12 | No reason recorded |
| Present | 2022-01-31 | Endpoint is disabled |
| Raindrop | 2022-01-31 | Endpoint stopped working |
| Shortnote | 2021-10-12 | No reason recorded |
| Spotful | 2021-10-12 | Site has been down for a long time |
| TourHero | 2022-01-31 | No reason recorded |
| Uppy | 2021-10-12 | No reason recorded |

## 2.0.20

| Provider | Removed on | Reason |
|----------|------------|--------|
| Bopp | 2021-07-20 | Site is down |
| Meetup | 2021-07-20 | API has been down for a long time |

## 2.0.19

| Provider | Removed on | Reason |
|----------|------------|--------|
| Idomoo | 2021-05-27 | Stopped working |
| Omniscope | 2021-05-27 | Stopped working |
| Posixion | 2021-05-27 | Stopped working |
| Simplecast | 2021-05-27 | Stopped working |

## 2.0.14

| Provider | Removed on | Reason |
|----------|------------|--------|
| Flat | 2020-11-07 | Lack of support |
| Fontself | 2020-11-07 | No longer provides oembed support |
| Hulu | 2020-11-07 | Service is inactive |
| Kitchenbowl | 2020-11-07 | Service is inactive |
| Mathembed | 2020-11-07 | Site is no longer online |
| Twitch | 2020-11-07 | oembed was deprecated with no replacement endpoint |

## 2.0.9

| Provider | Removed on | Reason |
|----------|------------|--------|
| Soundsgood | 2020-06-16 | Service was discontinued |

## 2.0.6

| Provider | Removed on | Reason |
|----------|------------|--------|
| TheySaidSo | 2020-05-08 | oembed endpoint always returns an error |

## 2.0.4

| Provider | Removed on | Reason |
|----------|------------|--------|
| DTube | 2020-04-06 | Endpoint stopped working |
| Firework | 2020-04-06 | Endpoint stopped working |

## 2.0.3

| Provider | Removed on | Reason |
|----------|------------|--------|
| CollegeHumor | 2020-01-24 | Site closed in January 2020 |
| Quizz | 2020-03-18 | Endpoint stopped working |
| Xpression | 2020-03-18 | oembed endpoint stopped working |
