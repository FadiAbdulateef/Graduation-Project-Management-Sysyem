<svg xmlns="http://www.w3.org/2000/svg" viewBox="50 0 150 50">
    <defs>
        <filter id="editing-hole" width="40" height="30">
            <feFlood flood-color="#000" result="black" />
            <feMorphology in="SourceGraphic" operator="dilate" radius="2" result="erode" />
            <feGaussianBlur in="erode" result="blur" stdDeviation="4" />
            <feOffset dx="2" dy="2" in="blur" result="offset" />
            <feComposite in="offset" in2="black" operator="atop" result="merge" />
            <feComposite in="merge" in2="SourceGraphic" operator="in" result="inner-shadow" />
        </filter>
    </defs>
    <img src="{{URL::asset('assets/img/brand/amran.jpg')}}" width="120" height="20"  alt="شعار الكلية">
    <text fill="#000000" font-family="Serif" font-size="20" font-weight="bold"  letter-spacing="2" stroke-width="0" text-anchor="inherit" textLength="0" transform="matrix(2.4908 0 0 5.10382 -78.9174 35.7635)" word-spacing="2" x="33.44" xml:space="default" y="1"> إدارة مشاريع التخرج</text>
</svg>

