"use strict";

const Phone = use("App/Models/Phone");

class PhoneController {
  async index({ request, response, view }) {
    const params = request.get();

    const phones = await Phone.query().where(params).fetch();

    return phones;
  }

  async store({ request, response }) {
    const data = request.only(["name", "email"]);

    const phone = await Phone.create(data);

    return phone;
  }

  async show({ params, request, response, view }) {
    const id = params.id;

    const phone = await Phone.findOrFail(id);

    return phone;
  }

  async update({ params, request, response }) {
    const id = params.id;
    const data = request.only(["name", "email"]);

    const phone = await Phone.findOrFail(id);

    phone.merge(data);
    await phone.save();

    return phone;
  }

  async destroy({ params, request, response }) {
    const id = params.id;

    const phone = await Phone.findOrFail(id);

    await phone.delete();
  }
}

module.exports = PhoneController;
