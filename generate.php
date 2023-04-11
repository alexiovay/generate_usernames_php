<?php

public function generateUsername($gender = 0)
    {
        $nameFile = $gender === 0 ? 'prenames_female.txt' : 'prenames_male.txt';
        $path = __DIR__.'/'.$nameFile;
        $commonNames = file($path, FILE_IGNORE_NEW_LINES | FILE_SKIP_EMPTY_LINES);

        $popularWordsActivities = [
            "flower", "sports", "photography", "music", "travel", "cooking",
            "hiking", "reading", "writing", "painting", "dancing", "gaming",
            "fishing", "camping", "skiing", "surfing", "skating", "yoga",
            "swimming", "gardening", "baking", "knitting", "jogging", "cycling",
            "exploring", "drawing", "singing", "theater", "meditation", "pottery",
            "fitness", "golf", "sailing", "volleyball", "basketball", "soccer",
            "bowling", "running", "tennis", "baseball", "kayaking", "climbing",
            "horseriding", "diving", "snorkeling", "paragliding", "birdwatching",
            "pilates", "archery", "boxing", "martialarts", "iceskating", "crossfit",
            "skydiving", "hunting", "rafting", "canoeing", "mountaineering", "curling",
            "fencing", "badminton", "squash", "rugby", "skateboarding", "parkour",
            "bouldering", "waterpolo", "lacrosse", "gymnastics", "trampolining", "pingpong",
            "rollerskating", "snowboarding", "windsurfing", "smoking"
        ];

        $randomCommonWords = [
            "sunrise", "moonlight", "rainbow", "forest", "ocean", "mountain",
            "river", "sky", "garden", "breeze", "star", "cloud",
            "fire", "winter", "summer", "autumn", "spring", "wave",
            "tree", "meadow", "snow", "sun", "leaf", "storm",
            "beach", "thunder", "lightning", "sunset", "night", "dawn",
            "twilight", "frost", "desert", "rose", "orchid", "tulip",
            "daisy", "butterfly", "dragonfly", "dolphin", "whale", "coral",
            "reef", "shell", "pebble", "sand", "sea", "mist",
            "glacier", "volcano", "fog", "rain", "hail", "wind",
            "tornado", "hurricane", "earthquake", "avalanche", "tsunami", "comet",
            "meteor", "jungle", "swamp", "marsh", "prairie", "canyon",
            "plateau", "tundra", "fjord", "iceberg", "grotto", "cave",
            "oasis", "waterfall", "geyser", "archipelago", "lagoon", "atoll",
            "island", "reef", "delta", "dune", "mesa", "butte",
            "cliff", "crater", "valley", "basin", "ridge", "peninsula"
        ];
        $choice = rand(1, 2);

        if ($choice == 1) {
            $name = $this->pickRandom($commonNames);
            $word = $this->pickRandom($popularWordsActivities);
        } else {
            $name = $this->pickRandom($randomCommonWords);
            $word = $this->pickRandom($randomCommonWords);
        }

        return $this->mergeWords(strtolower($name), strtolower($word));
    }

    public function mergeWords($word1, $word2) {
        // 80% chance to use an underscore
        $underscore =  (rand(1, 100) <= 20) ? '' : '_';
        return $word1 . $underscore . $word2;
    }

    public function pickRandom($items) {
        return $items[rand(0, count($items) - 1)];
    }
