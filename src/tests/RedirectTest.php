<?php

    namespace Lumber94\Redirector\Test;

    use Illuminate\Support\Facades\Input;
    use Lumber94\Redirector\Models\Redirect;
    use Tests\TestCase;

    class RedirectTest extends TestCase
    {
        public function testPages()
        {
            $this->call(
                'GET',
                route(config('redirect.route_as') . 'redirect.index')
            )->assertOk();

            $this->call(
                'GET',
                route(config('redirect.route_as') . 'redirect.create')
            )->assertOk();

            $this->call(
                'GET',
                route(config('redirect.route_as') . 'redirect.edit', ['redirect' => $this->redirect()])
            )->assertOk();
        }

        public function testStoreMethod()
        {
            $this
                ->call(
                    'POST',
                    route(config('redirect.route_as') . 'redirect.store'),
                    $this->input()->all()
                )
                ->assertRedirect(route(config('redirect.route_as') . 'redirect.index'))
                ->assertSessionHas('success', __('redirect::redirect.stored'));
        }

        public function testStoreFailMethod()
        {
            $this
                ->call(
                    'POST',
                    route(config('redirect.route_as') . 'redirect.store'),
                    $this->input_fail()->all()
                )
                ->assertStatus(302)
                ->assertSessionHasErrors([
                    'position' => 'The Position may not be greater than 999999.',
                ]);
        }

        public function testUpdateMethod()
        {
            $this
                ->call(
                    'PUT',
                    route(config('redirect.route_as') . 'redirect.update', ['redirect' => $this->redirect()]),
                    $this->input()->all()
                )
                ->assertRedirect(route(config('redirect.route_as') . 'redirect.index'))
                ->assertSessionHas('success', __('redirect::redirect.updated'));
        }

        public function testUpdateFailMethod()
        {
            $this
                ->call(
                    'PUT',
                    route(config('redirect.route_as') . 'redirect.update', ['redirect' => $this->redirect()]),
                    $this->input_fail()->all()
                )
                ->assertStatus(302)
                ->assertSessionHasErrors([
                    'position' => 'The Position may not be greater than 999999.',
                ]);
        }

        public function testDestroyMethod()
        {
            $this
                ->call(
                    'DELETE',
                    route(config('redirect.route_as') . 'redirect.destroy', ['redirect' => $this->redirect()])
                )
                ->assertRedirect(route(config('redirect.route_as') . 'redirect.index'))
                ->assertSessionHas('danger', __('redirect::redirect.destroyed'));
        }

        private function input()
        {
            return Input::replace([
                'url_from'    => 'http://example-url-' . rand(1, 999999) . '.org',
                'url_to'      => 'http://example-url-' . rand(1, 999999) . '.org',
                'status_code' => rand(301, 302),
                'is_active'   => rand(0, 1),
                'position'    => rand(1, 999999),
            ]);
        }

        private function input_fail()
        {
            return Input::replace([
                'url_from'    => 'http://example-url-' . rand(1, 999999) . '.org',
                'url_to'      => 'http://example-url-' . rand(1, 999999) . '.org',
                'status_code' => rand(301, 302),
                'is_active'   => rand(0, 1),
                'position'    => 999999999999,
            ]);
        }

        private function redirect()
        {
            $redirect = Redirect::first();

            if (is_null($redirect)) {
                $redirect = Redirect::create($this->input()->all());
            }

            return $redirect;
        }
    }
