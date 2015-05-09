@include('partials.common.languages', ['languages' => Config::get('languages'), 'route' => 'app.language.change' ])

<script>
    @if(!empty(Config::get('settings')->analytics_id))
    (function(i,s,o,g,r,a,m){i['GoogleAnalyticsObject']=r;i[r]=i[r]||function(){
        (i[r].q=i[r].q||[]).push(arguments)},i[r].l=1*new Date();a=s.createElement(o),
            m=s.getElementsByTagName(o)[0];a.async=1;a.src=g;m.parentNode.insertBefore(a,m)
    })(window,document,'script','//www.google-analytics.com/analytics.js','ga');
    ga('create', '{{ Config::get('settings')->analytics_id }}', 'auto');
    ga('send', 'pageview');
    @endif

    @if(!empty(Config::get('settings')->disqus_shortname))
    var disqus_shortname = '{{ Config::get('settings')->disqus_shortname }}';
    (function() {
        var dsq = document.createElement('script'); dsq.type =
                'text/javascript'; dsq.async = true;
        dsq.src = '//' + disqus_shortname + '.disqus.com/embed.js';
        (document.getElementsByTagName('head')[0] ||
        document.getElementsByTagName('body')[0]).appendChild(dsq);
    })();
    @endif
</script>