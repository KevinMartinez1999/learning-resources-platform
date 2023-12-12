<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Resource;
use App\Models\Voter;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Cookie;

class VoteController extends Controller
{
    public function __invoke(Request $request, Resource $resource)
    {
        // Buscar o crear votante buscando en las cookies. Si no exite crearlo.
        $voter = Voter::getOrCreateVoter($request);

        // Togglear el voto del votante en el recurso
        $resource->votes()->toggle($voter->id);

        // Devolver el recurso con los votos
        return $resource->load('votes', 'category');
    }
}
