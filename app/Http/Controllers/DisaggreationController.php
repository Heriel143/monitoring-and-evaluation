<?php

namespace App\Http\Controllers;

use App\Models\Disaggretion\AgeCategory;
use App\Models\Disaggretion\AgGDPComponent;
use App\Models\Disaggretion\CategoryOfResearch;
use App\Models\Disaggretion\Commodity;
use App\Models\Disaggretion\DevelopmentPhases;
use App\Models\Disaggretion\Duration;
use App\Models\Disaggretion\FundingSource;
use App\Models\Disaggretion\Location;
use App\Models\Disaggretion\PhasesOfDevelopment;
use App\Models\Disaggretion\ProductType;
use App\Models\Disaggretion\ResourceType;
use App\Models\Disaggretion\Sex;
use App\Models\Disaggretion\Size;
use App\Models\Disaggretion\SizeOfRecipient;
use App\Models\Disaggretion\TenureType;
use App\Models\Disaggretion\TrainingType;
use App\Models\Disaggretion\Type;
use App\Models\Disaggretion\TypeOfAssetStrengthened;
use App\Models\Disaggretion\TypeOfDocumentation;
use App\Models\Disaggretion\TypeOfIndividual;
use App\Models\Disaggretion\TypeOfOrganization;
use App\Models\Disaggretion\ValueChainActorType;
use App\Models\Indicator;
use App\Models\IndicatorData;
use Illuminate\Http\Request;

class DisaggreationController extends Controller
{
    public function sex(Request $request)
    {
        $indicator = Indicator::find($request->indicator_id);
        $indicatordata = IndicatorData::where('indicator_id', $request->indicator_id)->get();
        $results = null;
        switch ($indicator->disagretion) {
            case 'Sex':
                $results = Sex::all();
                break;
            case 'Age Category':
                $results = AgeCategory::all();
                break;
            case 'Type Of Individual':
                $results = TypeOfIndividual::all();
                break;
            case 'Size':
                $results = Size::all();
                break;
            case 'Location':
                $results = Location::all();
                break;
            case 'Commodity':
                $results = Commodity::all();
                break;
            case 'Duration':
                $results = Duration::all();
                break;
            case 'Ag GDP + Component':
                $results = AgGDPComponent::all();
                break;
            case 'Funding Source':
                $results = FundingSource::all();
                break;
            case 'Category of Research':
                $results = CategoryOfResearch::all();
                break;
            case 'Phases of Development':
                $results = PhasesOfDevelopment::all();
                break;
            case 'Value Chain Actor Type':
                $results = ValueChainActorType::all();
                break;
            case 'Type Of Hectare':
                $results = ValueChainActorType::all();
                break;
            case 'Size Of Recipient':
                $results = SizeOfRecipient::all();
                break;
            case 'Type Of Organization':
                $results = TypeOfOrganization::all();
                break;
            case 'Product Type':
                $results = ProductType::all();
                break;
            case 'Resource Type':
                $results = ResourceType::all();
                break;
            case 'Type Of Documentation':
                $results = TypeOfDocumentation::all();
                break;
            case 'Tenure Type':
                $results = TenureType::all();
                break;
            case 'Type Of Asset Strengthened':
                $results = TypeOfAssetStrengthened::all();
                break;
            case 'Training Type':
                $results = TrainingType::all();
                break;
            case 'Type':
                $results = Type::all();
                break;
            case 'Development Phases':
                $results = DevelopmentPhases::all();
                break;
        }
        // $results = Duration::all();
        $target = 0;
        $actual = 0;
        for ($i = 0; $i < count($indicatordata); $i++) {
            $results[$i]['target'] = $indicatordata[$i]['target'];
            $target += $indicatordata[$i]['target'];
            $results[$i]['actual'] = $indicatordata[$i]['actual'];
            $actual += $indicatordata[$i]['actual'];
        }
        // dd($indicatordata);
        $indicator['target'] = $target;
        $indicator['actual'] = $actual;

        $one = [$indicator, $results];
        return response()->json($one);
    }
    public function getAll($id)
    {
        $results = null;
        switch ($id) {
            case 'Sex':
                $results = Sex::all();
                break;
            case 'Age Category':
                $results = AgeCategory::all();
                break;
            case 2:
                echo "i equals 2";
                break;
        }
        return view('admin.farmer.disagretionDetail', compact('results'));
        // return response()->json($results);
    }
}
