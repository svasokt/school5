<?php


class TravelFromUkraineToUSA
{
    public function travel(TransportInterface $transport)
    {
        return 'i travel' . $transport->ride();
    }
}