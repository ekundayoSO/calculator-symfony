<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class CalculatorController extends AbstractController
{
    #[Route('/', name: "calculator")]

    public function calculate(Request $request): Response
    {
        $num1 = $request->query->get('num1');
        $num2 = $request->query->get('num2');
        $operator = $request->query->get('operators');

        $result = null;

        if (!empty($num1) && !empty($num2) && !empty($operator)) {
            switch ($operator) {
                case 'addition':
                    $result = $num1 + $num2;
                    break;
                case 'subtraction':
                    $result = $num1 - $num2;
                    break;
                case 'multiplication':
                    $result = $num1 * $num2;
                    break;
                case 'division':
                    $result = $num1 / $num2;
                    break;
                default:
                    echo "Enter a valid number";

            }
        }

        return $this->render('calculator/operators.html.twig', [
            'num1' => $num1,
            'num2' => $num2,
            'operator' => $operator,
            'result' => $result,
        ]);
    }
}
