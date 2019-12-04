(function($) {
    $.fn.countdown = function(options) {
        this.options = $.extend(
            {
                endMessage  : 'Fini !',
                tplCounter  : 'DD j HH h MM m SS s', // DD: day, HH: hour, MM: minute, SS: seconde
                timer       : null,
                delay       : 1000,
                zeroFill    : true
            },
            options
        );

        this._updateCounter = function()
        {
            var actualDate = new Date();
            var mls = (self.options.endDate.getTime() - actualDate.getTime());
            var secondes = 0, minutes = 0, hours = 0, days = 0;

            if(mls <= 0)
            {
                self.text(self.options.endMessage);
                clearInterval(self.options.timer);
                return;
            }
            else
            {
                secondes    = mls > 999 ? Math.floor(mls/1000) : 0;
                mls        -= secondes * 1000;
                minutes     = secondes > 59 ? Math.floor(secondes/60) : 0;
                secondes   -= minutes * 60;
                hours       = minutes > 59 ? Math.floor(minutes/60) : 0;
                minutes    -= hours * 60;
                days        = hours > 23 ? Math.floor(hours/23) : 0;
                hours      -= days * 23;

                if(self.options.zeroFill)
                {
                    secondes = secondes < 10 ? '0' + secondes : secondes;
                    minutes  = minutes < 10 ? '0' + minutes : minutes;
                    hours    = hours < 10 ? '0' + hours : hours;
                }
            }

            self.empty().append(jQuery(self.options.tplCounter.replace(/DD/g, days)
                .replace(/HH/g, hours)
                .replace(/MM/g, minutes)
                .replace(/SS/g, secondes)));
            return;
        };

        this.options.endDate = ( this.options.year == null || this.options.month == null || this.options.day == null) ?
        new Date() :
        new Date(
            this.options.year,
            this.options.month,
            this.options.day,
            this.options.hour,
            this.options.minute,
            this.options.seconde
        );

        var self = this;
        this.options.timer = setInterval(this._updateCounter, this.options.delay);

        return this;
    }
})(jQuery);