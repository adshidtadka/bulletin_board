<html>
<meta charset="utf-8">
こんにちは、{$Name}さん。
<ul>
{foreach from=$Fruits key=key item=item}
    <li>{$key}: <b>{$item}</b></li>
{/foreach}
</ul>
</html>
