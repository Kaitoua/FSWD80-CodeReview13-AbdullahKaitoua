<?php
namespace AppBundle\Controller;
// We include the entity that we create in our Controller file
use AppBundle\Entity\Eventlist;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Request;

// Now we need some classes in our Controller because we need that in our form (for the inputs that we will create)
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\Form\Extension\Core\Type\TextareaType;
use Symfony\Component\Form\Extension\Core\Type\DateTimeType;
use Symfony\Component\Form\Extension\Core\Type\ChoiceType;
use Symfony\Component\Form\Extension\Core\Type\SubmitType;
class EventController extends Controller
{
   /**
    * @Route("/", name="event_list")
    */
   public function eventlistAction(Request $request)
   {
        $events = $this->getDoctrine()->getRepository('AppBundle:Eventlist')->findAll();
       // replace this example code with whatever you need
       return $this->render('event/index.html.twig', array('events'=>$events));
   }
       /**
    * @Route("/event/create", name="event_create")
    */
   public function eventcreateAction(Request $request){

// Here we create an object from the class that we made
       $event = new Eventlist;

/* Here we will build a form using createFormBuilder and inside this function we will put our object and then we write add then we select the input type then an array to add an attribute that we want in our input field */
       $form = $this->createFormBuilder($event)->add('name', TextType::class, array('attr' => array('class'=> 'form-control', 'style'=>'margin-bottom:15px')))
       ->add('edatetime', DateTimeType::class, array('attr' => array('style'=>'margin-bottom:15px')))
       ->add('description', TextareaType::class, array('attr' => array('class'=> 'form-control', 'style'=>'margin-bottom:15px')))
       ->add('img', TextType::class, array('attr' => array('class'=> 'form-control', 'style'=>'margin-bottom:15px')))
       ->add('capacity', TextType::class, array('attr' => array('class'=> 'form-control', 'style'=>'margin-bottom:15px')))
       ->add('email', TextType::class, array('attr' => array('class'=> 'form-control', 'style'=>'margin-bottom:15px')))
       ->add('phone', TextType::class, array('attr' => array('class'=> 'form-control', 'style'=>'margin-bottom:15px')))
       ->add('address', TextType::class, array('attr' => array('class'=> 'form-control', 'style'=>'margin-bottom:15px')))
       ->add('weburl', TextType::class, array('attr' => array('class'=> 'form-control', 'style'=>'margin-bottom:15px')))
        ->add('type', ChoiceType::class, array('choices'=>array('music'=>'music', 'sport'=>'sport', 'movie'=>'movie', 'theater'=>'theater'),'attr' => array('class'=> 'form-control', 'style'=>'margin-bottom:15px')))
 
   ->add('save', SubmitType::class, array('label'=> 'Create an Event', 'attr' => array('class'=> 'btn-primary', 'style'=>'margin-bottom:15px')))
       ->getForm();
       $form->handleRequest($request);


/* Here we have an if statement, if we click submit and if  the form is valid we will take the values from the form and we will save them in the new variables */
       if($form->isSubmitted() && $form->isValid()){
           //fetching data
           $name = $form['name']->getData();
           $edatetime = $form['edatetime']->getData();
           $description = $form['description']->getData();
           $img = $form['img']->getData();
           $capacity = $form['capacity']->getData();
           $email = $form['email']->getData();
           $phone = $form['phone']->getData();
           $address = $form['address']->getData();
           $weburl = $form['weburl']->getData();
           $type = $form['type']->getData();


/* these functions we bring from our entities, every column have a set function and we put the value that we get from the form */
           $event->setName($name);           
           $event->setEdatetime($edatetime);           
           $event->setDescription($description);          
           $event->setImg($img);
           $event->setCapacity($capacity);
           $event->setEmail($email);
           $event->setPhone($phone);
           $event->setAddress($address);
           $event->setWeburl($weburl);
           $event->setType($type);
           $em = $this->getDoctrine()->getManager();
           $em->persist($event);
           $em->flush();
           $this->addFlash(
                   'notice',
                   'event Added'
                   );
           return $this->redirectToRoute('event_list');
       }
/* now to make the form we will add this line form->createView() and now you can see the form in create.html.twig file  */
       return $this->render('event/create.html.twig', array('form' => $form->createView()));
   }
   /**
  * @Route("/event/edit/{id}", name="event_edit")
  */
   public function editAction( $id, Request $request){

/* Here we have a variable event and it will save the result of this search and it will be one result because we search based on a specific id */
   $event = $this->getDoctrine()->getRepository('AppBundle:Eventlist')->find($id);


/* Now we will use set functions and inside this set functions we will bring the value that is already exist using get function for example we have setName() and inside it we will bring the current value and use it again */
           $event->setName($event->getName());
           $event->setEdatetime($event->getEdatetime());
           $event->setDescription($event->getDescription());
           $event->setImg($event->getImg());
           $event->setCapacity($event->getCapacity());
           $event->setEmail($event->getEmail());
           $event->setPhone($event->getPhone());
           $event->setAddress($event->getAddress());
           $event->setWeburl($event->getWeburl());
           $event->setType($event->getType());

/* Now when you type createFormBuilder and you will put the variable event the form will be filled of the data that you already set it */
 $form = $this->createFormBuilder($event)->add('name', TextType::class, array('attr' => array('class'=> 'form-control', 'style'=>'margin-bottom:15px')))
       ->add('edatetime', DateTimeType::class, array('attr' => array('style'=>'margin-bottom:15px')))
       ->add('description', TextareaType::class, array('attr' => array('class'=> 'form-control', 'style'=>'margin-bottom:15px')))
       ->add('img', TextType::class, array('attr' => array('class'=> 'form-control', 'style'=>'margin-bottom:15px')))
       ->add('capacity', TextType::class, array('attr' => array('class'=> 'form-control', 'style'=>'margin-bottom:15px')))
       ->add('email', TextType::class, array('attr' => array('class'=> 'form-control', 'style'=>'margin-bottom:15px')))
       ->add('phone', TextType::class, array('attr' => array('class'=> 'form-control', 'style'=>'margin-bottom:15px')))
       ->add('address', TextType::class, array('attr' => array('class'=> 'form-control', 'style'=>'margin-bottom:15px')))
       ->add('weburl', TextType::class, array('attr' => array('class'=> 'form-control', 'style'=>'margin-bottom:15px')))
        ->add('type', ChoiceType::class, array('choices'=>array('music'=>'music', 'sport'=>'sport', 'movie'=>'movie', 'theater'=>'theater'),'attr' => array('class'=> 'form-control', 'style'=>'margin-bottom:15px')))
 
   ->add('save', SubmitType::class, array('label'=> 'Update An Event', 'attr' => array('class'=> 'btn-primary', 'style'=>'margin-bottom:15px')))
       ->getForm();
       $form->handleRequest($request);
       if($form->isSubmitted() && $form->isValid()){
           //fetching data
         $name = $form['name']->getData();
           $edatetime = $form['edatetime']->getData();
           $description = $form['description']->getData();
           $img = $form['img']->getData();
           $capacity = $form['capacity']->getData();
           $email = $form['email']->getData();
           $phone = $form['phone']->getData();
           $address = $form['address']->getData();
           $weburl = $form['weburl']->getData();
           $type = $form['type']->getData();
           
           $em = $this->getDoctrine()->getManager();
           $event = $em->getRepository('AppBundle:Eventlist')->find($id);
           $event->setName($name);           
           $event->setEdatetime($edatetime);           
           $event->setDescription($description);          
           $event->setImg($img);
           $event->setCapacity($capacity);
           $event->setEmail($email);
           $event->setPhone($phone);
           $event->setAddress($address);
           $event->setWeburl($weburl);
           $event->setType($type);
       
           $em->flush();
           $this->addFlash(
                   'notice',
                   'event Updated'
                   );
           return $this->redirectToRoute('event_list');
       }
       return $this->render('event/edit.html.twig', array('event' => $event, 'form' => $form->createView()));
   }
    /**
    * @Route("/event/details/{id}", name="event_details")
    */

public function detailsAction($id){
               $event = $this->getDoctrine()->getRepository('AppBundle:Eventlist')->find($id);
       return $this->render('event/details.html.twig', array('event' => $event));
   }

   /**
    * @Route("/event/delete/{id}", name="event_delete")
    */
   public function deleteAction($id){
            $em = $this->getDoctrine()->getManager();
           $event = $em->getRepository('AppBundle:Eventlist')->find($id);
           $em->remove($event);
            $em->flush();
           $this->addFlash(
                   'notice',
                   'event Removed'
                   );
            return $this->redirectToRoute('event_list');
   }
   /**
    * @Route("/sort/{type}", name="sort_event")
    */
    public function sorteventAction(Request $request, $type){
        $em = $this->getDoctrine()->getManager();
        $events = $em->getRepository('AppBundle:Eventlist')->findByType($type);
        return $this->render('event/sort.html.twig', array('events'=>$events, 'type' => $type));
    }
}